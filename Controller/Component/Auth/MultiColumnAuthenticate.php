<?php

App::uses('FormAuthenticate', 'Controller/Component/Auth');

/**
 * An authentication adapter for AuthComponent. Provides the ability to authenticate using POST
 * data. The username form input can be checked against multiple table columns, for instance username and email
 * {{{
 * $this->Auth->authenticate = array(
 *        'Authenticate.MultiColumn' => array(
 *            'fields' => array(
 *                'username' => 'username',
 *                'password' => 'password'
 *            ),
 *            'columns' => array('username', 'email'),
 *            'userModel' => 'User',
 *            'scope' => array('User.active' => 1)
 *        )
 *    )
 * }}}
 *
 * @author    Ceeram
 * @copyright Ceeram
 * @license   MIT
 * @link      https://github.com/ceeram/Authenticate
 */
class MultiColumnAuthenticate extends FormAuthenticate {

	/**
	 * Settings for this object.
	 * - `fields` The fields to use to identify a user by.
	 * - 'columns' array of columns to check username form input against
	 * - `userModel` The model name of the User, defaults to User.
	 * - `scope` Additional conditions to use when looking up and authenticating users,
	 * i.e. `array('User.is_active' => 1).`
	 *
	 * @var array
	 */
	public $settings = [
		'fields' => [
			'username' => 'username',
			'password' => 'password',
		],
		'columns' => [],
		'userModel' => 'User',
		'scope' => [],
	];

	/**
	 * Find a user record using the standard options.
	 *
	 * @param string $username The username/identifier.
	 * @param string $password The unhashed password.
	 * @return Mixed Either false on failure, or an array of user data.
	 */
	protected function _findUser($username, $password = null) {
		$userModel = $this->settings['userModel'];
		list($plugin, $model) = pluginSplit($userModel);
		$fields = $this->settings['fields'];
		$conditions = [$model . '.' . $fields['username'] => $username];
		if ($this->settings['columns'] && is_array($this->settings['columns'])) {
			$columns = [];
			foreach ($this->settings['columns'] as $column) {
				$columns[] = [$model . '.' . $column => $username];
			}
			$conditions = ['OR' => $columns];
		}
		$conditions = array_merge($conditions, [$model . '.' . $fields['password'] => Security::hash($password)]);
		if (!empty($this->settings['scope'])) {
			$conditions = array_merge($conditions, $this->settings['scope']);
		}
		$result = ClassRegistry::init($userModel)->find('first', [
			'conditions' => $conditions,
			'recursive' => 0,
		]);
		if (empty($result) || empty($result[$model])) {
			return false;
		}

		unset($result[$model][$fields['password']]);
		$user = $result[$model];
		unset($result[$model]);
		return array_merge($user, $result);
	}

}
