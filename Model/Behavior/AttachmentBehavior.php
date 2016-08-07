<?php

App::uses('ModelBehavior', 'Model');

/**
 * A behavior to save attachments

 */
class AttachmentBehavior extends ModelBehavior {

	public $path;

	public $fullpath;

	public $foreignKey = 'offer_id';

	public $File = 'File';

	public function setup(Model $model, $config = []) {
		$this->path = WWW_ROOT . 'files' . DS;
		parent::setup($model);
	}

	/**
	 * before save method
	 *
	 * @param Model $model
	 * @param array $options
	 * @return true
	 */
	public function beforeSave(Model $model, $options = []) {
		//check for errors before starting the upload.
		if (isset($model->data[$model->alias]['file'])) {
			$this->checkForErrors($model);
		}
		return parent::beforeSave($model, $options);
	}

	/**
	 * @param Model $model
	 * @param type  $created
	 * @param type  $options
	 */
	public function afterSave(Model $model, $created, $options = []) {
		//do not execute anything else if the file is not set.
		if (!isset($model->data[$model->alias]['file'])) {
			return true;
		}
		$this->saveFile($model);
		$this->moveFile();

		$dest = $this->path . $model->data[$model->alias]['file']['name'];
		$source = $model->data[$model->alias]['file']['tmp_name'];

		return parent::afterSave($model, $created, $options);
	}

	public function saveFile(Model $model) {
		if (isset($model->data[$model->alias]['id'])) {
			$data['File']['id'] = $model->field($this->foreignKey);
		}
		$data['File']['uid'] = $this->uid($model);
		$data['File']['name'] = $model->data[$model->alias]['file']['name'];
		$data['File']['path'] = $this->path;
		$data['File']['alias'] = $model->alias;
		$data['File']['table'] = $model->table;

		if (!$model->File->save($data)) {
			throw new Exception('File data could not be saved');
		}
		$model->data[$model->alias]['file_id'] = $model->File->getLastInsertID();
	}

	/**
	 * @param Model $model
	 */
	public function uid(Model $model) {
		$id = $model->getID();
		$prefix = $model->alias;
		$name = $model->data[$model->alias]['file']['name'];

		$uid = [
			$id,
			$prefix,
			$name,
		];
		return implode('_', $uid);
	}

	/**
	 * Checks if the file is uploaded or else return an Exception.
	 *
	 * @param Model $model
	 * @return boolean
	 * @throws Exception
	 */
	public function checkForErrors(Model $model) {
		if (!$model->File->hasField($this->foreignKey)) {
			throw new Exception('You must create the field "' . $this->foreignKey . '" in your table.');
		}
		if (!is_array($model->data[$model->alias]['file'])) {
			throw new Exception('The file is not an array');
		}
		switch ($model->data[$model->alias]['file']['error']) {
			case UPLOAD_ERR_NO_FILE:
				throw new Exception('The file could not be uploaded');
			case UPLOAD_ERR_CANT_WRITE:
				throw new Exception('Check the folder permissions');
			default:
				throw new Exception('Error uploading file');
		}
		return true;
	}

	/**
	 * Alias for the move_uploaded_file function, so it can be mocked for testing purpose
	 *
	 * @return boolean returns true if the file is moved
	 */
	public function move_uploaded_file($source, $dest) {
		if (!move_uploaded_file($source, $dest)) {
			throw new Exception('File could not be uploaded');
		}
		return true;
	}

}
