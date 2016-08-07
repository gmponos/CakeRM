<?php
/**
 * Event Fixture
 */
class EventFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'details' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'start' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'all_day' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'status_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'updated_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'updated' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'title_UNIQUE' => array('column' => 'title', 'unique' => 1),
			'fk_events_event_statuses1_idx' => array('column' => 'status_id', 'unique' => 0),
			'fk_events_event_types1_idx' => array('column' => 'type_id', 'unique' => 0),
			'fk_events_users1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => '0',
			'type_id' => '2',
			'title' => 'Ραντεβού για την Twinsoft',
			'details' => '',
			'start' => '2014-11-28 11:00:00',
			'end' => '2014-11-28 18:00:00',
			'all_day' => 0,
			'status_id' => '1',
			'active' => 1,
			'created_user_id' => '1',
			'updated_user_id' => '1',
			'created' => '2014-11-26',
			'updated' => '2014-11-26'
		),
		array(
			'id' => '3',
			'user_id' => '0',
			'type_id' => '2',
			'title' => 'ενοικιαση laptop ξηροτηρη Μαρια ',
			'details' => '15 laptop με win 7 κ office 2013',
			'start' => '2014-12-08 10:00:00',
			'end' => '2014-12-08 12:30:00',
			'all_day' => 0,
			'status_id' => '1',
			'active' => 1,
			'created_user_id' => '10',
			'updated_user_id' => '1',
			'created' => '2014-11-27',
			'updated' => '2014-12-08'
		),
	);

}
