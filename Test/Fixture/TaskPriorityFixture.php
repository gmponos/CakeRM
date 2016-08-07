<?php
/**
 * TaskPriority Fixture
 */
class TaskPriorityFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'priority' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6, 'unsigned' => false),
		'icon' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'priority_UNIQUE' => array('column' => 'priority', 'unique' => 1)
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
			'priority' => 'ΠΟΛΥ ΧΑΜΗΛΗ',
			'order' => '0',
			'icon' => null,
			'modified' => '2013-09-23 15:29:46'
		),
		array(
			'id' => '2',
			'priority' => 'ΧΑΜΗΛΗ',
			'order' => '0',
			'icon' => null,
			'modified' => '2013-09-23 15:29:53'
		),
		array(
			'id' => '3',
			'priority' => 'ΜΕΣΑΙΑ',
			'order' => '0',
			'icon' => null,
			'modified' => '2013-09-23 15:29:58'
		),
		array(
			'id' => '4',
			'priority' => 'ΥΨΗΛΗ',
			'order' => '0',
			'icon' => null,
			'modified' => '2013-09-23 15:30:05'
		),
		array(
			'id' => '5',
			'priority' => 'ΑΜΕΣΑ',
			'order' => '0',
			'icon' => null,
			'modified' => '2013-09-23 15:30:12'
		),
	);

}
