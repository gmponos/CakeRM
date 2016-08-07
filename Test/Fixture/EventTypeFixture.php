<?php
/**
 * EventType Fixture
 */
class EventTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'color' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '2',
			'type' => 'Εγκατάσταση',
			'color' => 'Red',
			'modified' => '2014-11-13 21:23:32'
		),
		array(
			'id' => '3',
			'type' => 'Παρουσίαση',
			'color' => 'Purple',
			'modified' => '2014-11-13 21:26:55'
		),
		array(
			'id' => '4',
			'type' => 'Εκπαίδευση',
			'color' => 'Pink',
			'modified' => '2014-11-14 00:45:58'
		),
	);

}
