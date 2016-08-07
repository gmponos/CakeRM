<?php
/**
 * Group Fixture
 */
class GroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'comments' => array('type' => 'binary', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'admin',
			'active' => 0,
			'comments' => '',
			'created' => '2013-10-13 21:12:42',
			'updated' => '2013-10-13 21:12:42'
		),
		array(
			'id' => '2',
			'name' => 'manager',
			'active' => 0,
			'comments' => '',
			'created' => '2013-09-26 13:04:38',
			'updated' => '2013-09-26 13:04:38'
		),
		array(
			'id' => '3',
			'name' => 'user',
			'active' => 0,
			'comments' => '',
			'created' => '2013-09-26 13:05:44',
			'updated' => '2013-10-13 21:17:03'
		),
		array(
			'id' => '4',
			'name' => 'tech',
			'active' => 0,
			'comments' => '',
			'created' => '2014-02-24 00:17:19',
			'updated' => '2014-02-24 00:17:19'
		),
		array(
			'id' => '5',
			'name' => 'seller',
			'active' => 0,
			'comments' => '',
			'created' => '2014-02-24 00:17:57',
			'updated' => '2014-02-24 00:17:57'
		),
	);

}
