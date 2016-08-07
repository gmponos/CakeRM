<?php
/**
 * TaskStatus Fixture
 */
class TaskStatusFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6, 'unsigned' => false),
		'icon' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'state_UNIQUE' => array('column' => 'status', 'unique' => 1)
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
			'status' => 'ΑΝΑΜΟΝΗ',
			'order' => '0',
			'icon' => 'pause',
			'modified' => '2014-02-12 23:01:26'
		),
		array(
			'id' => '2',
			'status' => 'ΟΛΟΚΛΗΡΩΜΕΝΗ',
			'order' => '0',
			'icon' => 'check',
			'modified' => '2014-02-12 23:02:06'
		),
		array(
			'id' => '3',
			'status' => 'ΣΕ ΕΞΕΛΙΞΗ',
			'order' => '0',
			'icon' => 'play',
			'modified' => '2014-02-12 23:01:40'
		),
		array(
			'id' => '4',
			'status' => 'ΑΔΥΝΑΤΗ',
			'order' => '0',
			'icon' => 'ban',
			'modified' => '2014-02-12 23:02:51'
		),
	);

}
