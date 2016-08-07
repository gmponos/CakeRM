<?php
/**
 * TaskType Fixture
 */
class TaskTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6, 'unsigned' => false),
		'icon' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'type_UNIQUE' => array('column' => 'type', 'unique' => 1)
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
			'type' => 'ΠΩΛΗΣΕΙΣ ΠΡΟΙΟΝΤΩΝ',
			'order' => '2',
			'icon' => 'shopping-cart',
			'modified' => '2014-02-12 22:58:31'
		),
		array(
			'id' => '3',
			'type' => 'ΤΕΧΝΙΚΗ ΥΠΟΣΤΗΡΙΞΗ',
			'order' => '1',
			'icon' => 'gear',
			'modified' => '2014-02-12 22:57:51'
		),
		array(
			'id' => '4',
			'type' => 'ΕΙΣΕΡΧΟΜΕΝΗ',
			'order' => '4',
			'icon' => 'level-down',
			'modified' => '2014-02-12 22:59:41'
		),
		array(
			'id' => '5',
			'type' => 'ΕΓΚΑΤΑΣΤΑΣΗ',
			'order' => '3',
			'icon' => 'laptop',
			'modified' => '2014-02-12 23:00:07'
		),
		array(
			'id' => '6',
			'type' => 'ΕΞΕΡΧΟΜΕΝΗ',
			'order' => '5',
			'icon' => 'level-up',
			'modified' => '2014-02-12 22:59:51'
		),
		array(
			'id' => '7',
			'type' => 'ΕΙΚΟΣΙΤΕΤΡΑΩΡΗ',
			'order' => '0',
			'icon' => 'moon-o',
			'modified' => '2014-02-12 23:00:58'
		),
		array(
			'id' => '8',
			'type' => 'ΕΠΙΣΚΕΥΗ',
			'order' => '6',
			'icon' => 'wrench',
			'modified' => '2014-02-14 10:12:38'
		),
		array(
			'id' => '9',
			'type' => 'ΚΑΤΑΛΟΓΟΣ',
			'order' => '7',
			'icon' => 'file-o',
			'modified' => '2014-09-19 09:19:50'
		),
		array(
			'id' => '10',
			'type' => 'ΕΚΠΑΙΔΕΥΣΗ',
			'order' => '8',
			'icon' => 'graduation-cap',
			'modified' => '2014-09-29 17:00:24'
		),
	);

}
