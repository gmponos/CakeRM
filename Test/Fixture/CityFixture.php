<?php
/**
 * City Fixture
 */
class CityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'state_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'state_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_cities_states1_idx' => array('column' => 'state_id', 'unique' => 0)
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
			'id' => '2',
			'state_id' => '1',
			'name' => 'ΑΜΠΕΛΟΚΗΠΟΙ',
			'modified' => '2013-10-17 13:25:37'
		),
		array(
			'id' => '3',
			'state_id' => '1',
			'name' => 'ΧΑΙΔΑΡΙ',
			'modified' => null
		),
		array(
			'id' => '4',
			'state_id' => '1',
			'name' => 'ΑΝΩ ΛΙΟΣΙΑ',
			'modified' => '2013-09-11 20:15:23'
		),
		array(
			'id' => '5',
			'state_id' => '1',
			'name' => 'ΠΕΡΙΣΤΕΡΙ',
			'modified' => '2013-09-11 20:26:58'
		),
		array(
			'id' => '6',
			'state_id' => '1',
			'name' => 'ΚΗΦΙΣΙΑ',
			'modified' => '2013-09-11 20:36:16'
		),
		array(
			'id' => '7',
			'state_id' => '1',
			'name' => 'ΜΕΤΑΜΟΡΦΩΣΗ',
			'modified' => '2013-09-11 21:07:52'
		),
		array(
			'id' => '9',
			'state_id' => '1',
			'name' => 'ΑΙΓΑΛΕΩ',
			'modified' => '2013-09-11 21:36:55'
		),
		array(
			'id' => '10',
			'state_id' => '1',
			'name' => 'ΝΙΚΑΙΑ',
			'modified' => '2013-09-11 21:42:45'
		),
		array(
			'id' => '11',
			'state_id' => '2',
			'name' => 'ΣΑΝΤΟΡΙΝΗ',
			'modified' => '2013-09-12 06:59:24'
		),
		array(
			'id' => '12',
			'state_id' => '1',
			'name' => 'ΝΕΑ ΣΜΥΡΝΗ',
			'modified' => '2013-09-12 08:12:23'
		),
	);

}
