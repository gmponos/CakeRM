<?php
/**
 * DayOff Fixture
 */
class DayOffFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'day_off_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'start' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_day_offs_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_day_offs_day_off_types1_idx' => array('column' => 'day_off_type_id', 'unique' => 0)
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
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-01-02 00:00:00',
			'end' => '2014-01-03 00:00:00',
			'modified' => '2014-03-08 00:45:15'
		),
		array(
			'id' => '2',
			'user_id' => '4',
			'day_off_type_id' => '1',
			'start' => '2014-02-10 00:00:00',
			'end' => '2014-02-21 00:00:00',
			'modified' => '2014-11-14 15:28:04'
		),
		array(
			'id' => '3',
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-03-19 00:00:00',
			'end' => '2014-03-19 00:00:00',
			'modified' => '2014-03-19 16:56:24'
		),
		array(
			'id' => '4',
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-03-24 00:00:00',
			'end' => '2014-03-24 00:00:00',
			'modified' => '2014-03-26 14:45:03'
		),
		array(
			'id' => '5',
			'user_id' => '2',
			'day_off_type_id' => '1',
			'start' => '2014-04-09 00:00:00',
			'end' => '2014-04-16 00:00:00',
			'modified' => '2014-07-18 11:51:47'
		),
		array(
			'id' => '6',
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-07-08 00:00:00',
			'end' => '2014-07-11 00:00:00',
			'modified' => '2014-07-18 11:52:04'
		),
		array(
			'id' => '7',
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-08-10 00:00:00',
			'end' => '2014-08-23 00:00:00',
			'modified' => '2014-09-24 16:20:09'
		),
		array(
			'id' => '8',
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-11-05 00:00:00',
			'end' => '2014-11-05 00:00:00',
			'modified' => '2014-11-14 14:38:22'
		),
		array(
			'id' => '9',
			'user_id' => '1',
			'day_off_type_id' => '1',
			'start' => '2014-10-22 00:00:00',
			'end' => '2014-10-22 00:00:00',
			'modified' => '2014-11-14 14:39:04'
		),
		array(
			'id' => '10',
			'user_id' => '4',
			'day_off_type_id' => '1',
			'start' => '2014-08-04 00:00:00',
			'end' => '2014-08-14 00:00:00',
			'modified' => '2014-11-14 15:30:54'
		),
	);

}
