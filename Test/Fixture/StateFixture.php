<?php
/**
 * State Fixture
 */
class StateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'name' => 'ΑΤΤΙΚΗ',
			'modified' => '2013-09-11 22:00:16'
		),
		array(
			'id' => '2',
			'name' => 'ΚΥΚΛΑΔΕΣ',
			'modified' => '2013-09-11 22:00:16'
		),
		array(
			'id' => '3',
			'name' => 'ΕΥΒΟΙΑ',
			'modified' => '2013-09-11 22:02:18'
		),
		array(
			'id' => '4',
			'name' => 'ΘΕΣΣΑΛΟΝΙΚΗ',
			'modified' => '2013-09-12 06:52:40'
		),
		array(
			'id' => '5',
			'name' => 'ΑΧΑΙΑ',
			'modified' => '2013-09-12 07:32:14'
		),
		array(
			'id' => '6',
			'name' => 'ΔΩΔΕΚΑΝΗΣΑ',
			'modified' => '2013-09-12 07:32:25'
		),
		array(
			'id' => '8',
			'name' => 'ΧΑΛΚΙΔΙΚΗ',
			'modified' => '2013-09-12 07:32:54'
		),
		array(
			'id' => '9',
			'name' => 'ΣΕΡΡΕΣ',
			'modified' => '2013-09-12 07:33:36'
		),
		array(
			'id' => '10',
			'name' => 'ΚΑΒΑΛΑ',
			'modified' => '2013-09-12 07:33:42'
		),
		array(
			'id' => '11',
			'name' => 'ΚΟΡΙΝΘΟ',
			'modified' => '2013-09-12 07:34:00'
		),
	);

}
