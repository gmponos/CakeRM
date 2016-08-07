<?php

/**
 * ArosAco Fixture
 */
class ArosAcoFixture extends CakeTestFixture {

	/**
	 * Import
	 *
	 * @var array
	 */
	public $import = ['records' => true];

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = [
		'id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'],
		'aro_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'index'],
		'aco_id' => ['type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false],
		'_create' => ['type' => 'string', 'null' => false, 'default' => '0', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
		'_read' => ['type' => 'string', 'null' => false, 'default' => '0', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
		'_update' => ['type' => 'string', 'null' => false, 'default' => '0', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
		'_delete' => ['type' => 'string', 'null' => false, 'default' => '0', 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1],
			'ARO_ACO_KEY' => ['column' => ['aro_id', 'aco_id'], 'unique' => 1],
		],
		'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'],
	];

}
