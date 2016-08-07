<?php
/**
 * Task Fixture
 */
class TaskFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'business_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'contact_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'responsible_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'binary', 'null' => false, 'default' => null),
		'task_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'task_status_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'task_priority_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'duration' => array('type' => 'string', 'null' => true, 'default' => '00:00', 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'emailed' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'task_action_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false),
		'percent' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 6, 'unsigned' => false),
		'visible' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'target' => array('type' => 'date', 'null' => true, 'default' => null),
		'completed' => array('type' => 'date', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'updated_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_tasks_task_states1_idx' => array('column' => 'task_status_id', 'unique' => 0),
			'fk_tasks_task_priorities1_idx' => array('column' => 'task_priority_id', 'unique' => 0),
			'fk_tasks_task_types1_idx' => array('column' => 'task_type_id', 'unique' => 0),
			'fk_tasks_contact1_idx' => array('column' => 'contact_id', 'unique' => 0),
			'fk_tasks_bussinesses1_idx' => array('column' => 'business_id', 'unique' => 0),
			'tasks_responsible_user_idx' => array('column' => 'responsible_user_id', 'unique' => 0),
			'tasks_created_user_idx' => array('column' => 'created_user_id', 'unique' => 0),
			'tasks_updated_user_idx' => array('column' => 'updated_user_id', 'unique' => 0)
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
			'business_id' => '53',
			'contact_id' => null,
			'responsible_user_id' => '1',
			'title' => 'Ετοιμασαμε τα 2 PC που ζήτησαν για ενοικίαση.',
			'description' => 'Ετοιμασαμε τα 2 PC που ζήτησαν για ενοικίαση.',
			'task_type_id' => '5',
			'task_status_id' => '2',
			'task_priority_id' => '1',
			'duration' => '00:10',
			'emailed' => 0,
			'task_action_count' => '0',
			'percent' => null,
			'visible' => null,
			'target' => null,
			'completed' => '2013-09-19',
			'created_user_id' => '1',
			'updated_user_id' => '1',
			'created' => '2013-09-17 20:05:07',
			'updated' => '2013-09-25 20:58:49'
		),
		array(
			'id' => '2',
			'business_id' => null,
			'contact_id' => null,
			'responsible_user_id' => '1',
			'title' => 'Να φτιάξω το PC για την εγκατάσταση που ζήτησε ο Τ',
			'description' => 'Να φτιάξω το PC για την εγκατάσταση που ζήτησε ο Τάσος',
			'task_type_id' => '5',
			'task_status_id' => '2',
			'task_priority_id' => '1',
			'duration' => '00:10',
			'emailed' => 0,
			'task_action_count' => '0',
			'percent' => null,
			'visible' => null,
			'target' => null,
			'completed' => '2013-09-20',
			'created_user_id' => '1',
			'updated_user_id' => '1',
			'created' => '2013-09-19 09:34:50',
			'updated' => '2013-09-26 19:53:44'
		),
		array(
			'id' => '3',
			'business_id' => '19',
			'contact_id' => '5',
			'responsible_user_id' => '1',
			'title' => 'Θέλει ανανέωση στο πρόγραμμα. Μου είπες να το αναν',
			'description' => 'Θέλει ανανέωση στο πρόγραμμα. Μου είπες να το ανανεώσω για 2 μήνες.
Μίλησα όμως με τον Πλόσκα και μου είπε ότι το μαγαζί κλείνει για χειμώνα.',
			'task_type_id' => '3',
			'task_status_id' => '2',
			'task_priority_id' => '1',
			'duration' => '',
			'emailed' => 0,
			'task_action_count' => '0',
			'percent' => null,
			'visible' => null,
			'target' => null,
			'completed' => '2013-09-24',
			'created_user_id' => '1',
			'updated_user_id' => '1',
			'created' => '2013-09-19 09:43:31',
			'updated' => '2013-09-25 16:32:55'
		),
		array(
			'id' => '4',
			'business_id' => null,
			'contact_id' => '9',
			'responsible_user_id' => '1',
			'title' => 'Θέλει ανανέωση στο πρόγραμμα',
			'description' => 'Θέλει ανανέωση στο πρόγραμμα',
			'task_type_id' => '3',
			'task_status_id' => '4',
			'task_priority_id' => '1',
			'duration' => '',
			'emailed' => 0,
			'task_action_count' => '0',
			'percent' => null,
			'visible' => null,
			'target' => null,
			'completed' => '2013-11-08',
			'created_user_id' => '1',
			'updated_user_id' => '1',
			'created' => '2013-09-19 00:00:00',
			'updated' => '2013-11-08 16:56:57'
		),
		array(
			'id' => '5',
			'business_id' => '21',
			'contact_id' => null,
			'responsible_user_id' => '1',
			'title' => 'Θέλει ανανέωση στο πρόγραμμα. Σε ειδοποίησα και μο',
			'description' => 'Θέλει ανανέωση στο πρόγραμμα. Σε ειδοποίησα και μου είπες ότι έχει κλείσει.',
			'task_type_id' => '3',
			'task_status_id' => '2',
			'task_priority_id' => '1',
			'duration' => '',
			'emailed' => 0,
			'task_action_count' => '0',
			'percent' => null,
			'visible' => null,
			'target' => null,
			'completed' => '2013-09-24',
			'created_user_id' => '1',
			'updated_user_id' => '1',
			'created' => '2013-09-19 10:58:11',
			'updated' => '2013-09-25 15:58:38'
		),
	);

}
