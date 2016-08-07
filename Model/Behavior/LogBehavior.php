<?php

App::uses('ModelBehavior', 'Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('CakeSession', 'Model/Datasource');

/**
 * Log Behavior
 *
 * @package  app.Model.Behavior
 */
class LogBehavior extends ModelBehavior {

	/**
	 * afterSave is called after a model is saved.
	 *
	 * @param Model $model   Model using this behavior
	 * @param bool  $created True if this save created a new record
	 * @param array $options Options passed from Model::save().
	 * @return bool
	 * @see Model::save()
	 */
	public function afterSave(Model $model, $created, $options = []) {

		$data = json_encode($model->data);
		if ($created) {
			$message = sprintf(__('%s user created record with data: %s'), AuthComponent::user('username'), $data);
		} else {
			$message = sprintf(__('%s user saved record with data: %s'), AuthComponent::user('username'), $data);
		}
		$this->log($message, LOG_INFO);
		return parent::afterSave($model, $created, $options);
	}

	/**
	 * After delete is called after any delete occurs on the attached model.
	 *
	 * @param Model $model Model using this behavior
	 * @return void
	 */
	public function afterDelete(Model $model) {

		$this->log(sprintf(
			__('%s user deleted a record from %s with id %s'),
			AuthComponent::user('username'),
			$model->table,
			$model->id
		), LOG_INFO);
	}
}
