<?php

App::uses('ModelBehavior', 'Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Trackable Behavior
 * Populate `created_by` and `updated_by` fields from session data.
 *
 * @package  app.Model.Behavior
 * @since    1.6
 * @author   Rachman Chavik <rchavik@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 * @todo     we need to adapt this behaviour to our need. Currenty we added a custom function in AppModel.
 */
class TrackableBehavior extends ModelBehavior {

	/**
	 * Default settings
	 */
	protected $_defaults = [
		'userModel' => 'User',
		'fields' => [
			'created_by' => 'create_user_id',
			'updated_by' => 'update_user_id',
			'modified_by' => 'modified_user_id',
		],
	];

	/**
	 * Setup
	 */
	public function setup(Model $model, $config = []) {

		$this->settings[$model->alias] = Set::merge($this->_defaults, $config);
		if ($this->_hasTrackableFields($model)) {
			$this->_setupBelongsTo($model);
		}
	}

	/**
	 * Checks wether model has the required fields
	 *
	 * @return bool True if $model has the required fields
	 */
	protected function _hasTrackableFields(Model $model) {

		$fields = $this->settings[$model->alias]['fields'];
		return
			$model->hasField($fields['created_by']) &&
			$model->hasField($fields['updated_by']);
	}

	/**
	 * Bind relationship on the fly
	 */
	protected function _setupBelongsTo(Model $model) {

		if (!empty($model->belongsTo['CreatedBy'])) {
			return;
		}
		$config = $this->settings[$model->alias];
		list($plugin, $modelName) = pluginSplit($config['userModel']);
		$className = isset($plugin) ? $plugin . '.' . $modelName : $modelName;
		$model->bindModel([
			'belongsTo' => [
				'CreatedBy' => [
					'className' => $className,
					'foreignKey' => $config['fields']['created_by'],
				],
				'UpdatedBy' => [
					'className' => $className,
					'foreignKey' => $config['fields']['updated_by'],
				],
			],
		], false);
	}

	/**
	 * Fill the created_by and updated_by fields
	 * Note: Since shells do not have Sessions, created_by/updated_by fields
	 * will not be populated. If a shell needs to populate these fields, you
	 * can simulate a logged in user by setting `Trackable.Auth` config:
	 *   Configure::write('Trackable.User', array('id' => 1));
	 * Note that value stored in this variable overrides session data.
	 */

	public function beforeSave(Model $model, $options = []) {

		// Dont go any further if no data exists or field to update
		if (empty($model->data) && !$model->hasField(['created_by_id', 'updated_by_id', 'modified_by_id'])) {
			return parent::beforeSave($model, $options);
		}

		foreach (['created_by_id', 'updated_by_id', 'modified_by_id'] as $field) {
			$keyPresentAndEmpty = (
				isset($model->data[$model->alias]) &&
				array_key_exists($field, $model->data[$model->alias]) &&
				$model->data[$model->alias][$field] === null
			);

			if ($keyPresentAndEmpty) {
				unset($model->data[$model->alias][$field]);
			}
		}

		$exists = $model->exists();
		$userFields = ['modified_by_id', 'updated_by_id'];

		if (!$exists) {
			$userFields[] = 'created_by_id';
		}
		if (isset($model->data[$model->alias])) {
			$fields = array_keys($this->data[$model->alias]);
		}

		foreach ($userFields as $updateCol) {
			if (in_array($updateCol, $fields) || !$model->hasField($updateCol)) {
				continue;
			}

			$user = Configure::read('Auth.User');
			if (!$user && CakeSession::started()) {
				$user = AuthComponent::user();
			}

			if (!empty($model->whitelist)) {
				$model->whitelist[] = $updateCol;
			}
			$model->data[$model->alias][$updateCol] = $user['id'];
		}
		return parent::beforeSave($options);

	}

}
