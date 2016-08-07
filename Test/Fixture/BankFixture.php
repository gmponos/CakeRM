<?php

/**
 * Bank Fixture
 */
class BankFixture extends CakeTestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	public $fields = [
		'id' => [
			'type' => 'integer',
			'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true,
			'key' => 'primary',
		],
		'name' => ['type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'],
		'modified' => ['type' => 'datetime', 'null' => true, 'default' => null],
		'indexes' => [
			'PRIMARY' => ['column' => 'id', 'unique' => 1],
			'id_UNIQUE' => ['column' => 'id', 'unique' => 1],
			'name_UNIQUE' => ['column' => 'name', 'unique' => 1],
		],
		'tableParameters' => ['charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'],
	];

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = [
		[
			'id' => '1',
			'name' => 'ALPHA BANK',
			'modified' => '2014-10-17 01:14:52',
		],
		[
			'id' => '2',
			'name' => 'EUROBANK',
			'modified' => '2014-10-17 01:15:04',
		],
		[
			'id' => '3',
			'name' => 'ΕΘΝΙΚΗ ΤΡΑΠΕΖΑ',
			'modified' => '2014-11-14 17:05:30',
		],
		[
			'id' => '4',
			'name' => 'ΠΕΙΡΑΙΩΣ',
			'modified' => '2014-10-17 01:15:23',
		],
	];

}
