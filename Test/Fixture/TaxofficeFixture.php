<?php
/**
 * Taxoffice Fixture
 */
class TaxofficeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'doys_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'name_UNIQUE' => array('column' => 'name', 'unique' => 1)
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
			'name' => 'ΦΑΕ ΑΘΗΝΩΝ',
			'active' => 1,
			'modified' => '2013-09-11 19:54:42'
		),
		array(
			'id' => '2',
			'name' => 'ΦΑΒΕ ΑΘΗΝΩΝ',
			'active' => 1,
			'modified' => '2013-09-11 20:14:35'
		),
		array(
			'id' => '3',
			'name' => 'ΚΗΦΙΣΙΑΣ',
			'active' => 1,
			'modified' => '2013-09-23 17:13:44'
		),
		array(
			'id' => '4',
			'name' => 'ΝΕΑ ΦΙΛΑΔΕΛΦΕΙΑ',
			'active' => 1,
			'modified' => '2013-09-11 21:07:10'
		),
		array(
			'id' => '5',
			'name' => 'ΘΗΡΑΣ',
			'active' => 1,
			'modified' => '2013-09-12 06:59:00'
		),
		array(
			'id' => '6',
			'name' => 'Α ΠΕΡΙΣΤΕΡΙΟΥ',
			'active' => 1,
			'modified' => '2013-09-12 13:49:22'
		),
		array(
			'id' => '7',
			'name' => 'ΝΕΑ ΣΜΥΡΝΗ',
			'active' => 1,
			'modified' => '2013-09-12 08:11:51'
		),
		array(
			'id' => '8',
			'name' => 'ΠΑΛΛΗΝΗΣ',
			'active' => 1,
			'modified' => '2013-09-12 12:44:14'
		),
		array(
			'id' => '9',
			'name' => 'ΑΙΓΑΛΕΩ',
			'active' => 1,
			'modified' => '2013-09-12 13:39:47'
		),
		array(
			'id' => '10',
			'name' => 'Β ΠΕΡΙΣΤΕΡΙΟΥ',
			'active' => 1,
			'modified' => '2013-09-16 09:36:31'
		),
	);

}
