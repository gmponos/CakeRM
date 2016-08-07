<?php
/**
 * TaskAction Fixture
 */
class TaskActionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'description' => array('type' => 'binary', 'null' => false, 'default' => null),
		'task_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'modified_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_task_actions_tasks1_idx' => array('column' => 'task_id', 'unique' => 0)
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
			'description' => 'Δεν θυμάμαι να μου το είχε αναφέρει κάποιος. Τώρα το είδα θα κοιτάξω να το φτιάξω.',
			'task_id' => '1575',
			'modified_user_id' => '1',
			'modified' => '2014-11-14 00:53:50'
		),
		array(
			'id' => '2',
			'description' => 'Φαντάζομαι ότι επειδή του είπαμε 100 ευρώ δεν τα πλήρωσε ποτέ. Θα το βάλουμε ως αδύνατο.',
			'task_id' => '1472',
			'modified_user_id' => '1',
			'modified' => '2014-11-14 00:55:27'
		),
		array(
			'id' => '3',
			'description' => 'Στο bottega μπήκα και εγώ και χάνει Pings το PDA.',
			'task_id' => '1630',
			'modified_user_id' => '1',
			'modified' => '2014-11-18 12:56:18'
		),
		array(
			'id' => '4',
			'description' => 'έχουν αναλογικό και isdn modem από την πρώτη μέρα τις εγκατάστασης',
			'task_id' => '1627',
			'modified_user_id' => '4',
			'modified' => '2014-11-18 18:04:58'
		),
		array(
			'id' => '5',
			'description' => 'Μου είπε ο Μιχάλης ότι θα πρέπει να μας πληρώσει. Δεν έχω νέα ενημέρωση. Όπως επίσης έφαγα 5 ώρες χωρίς να ξέρουμε αν θα μας πληρώσει.',
			'task_id' => '1624',
			'modified_user_id' => '1',
			'modified' => '2014-11-19 13:56:31'
		),
		array(
			'id' => '6',
			'description' => 'Το βάζω ως αδύνατο διότι δεν έχω νέα ενημέρωση.',
			'task_id' => '1624',
			'modified_user_id' => '1',
			'modified' => '2014-11-24 09:24:18'
		),
		array(
			'id' => '7',
			'description' => 'Το έφτιαξε ο Τάσος.',
			'task_id' => '1388',
			'modified_user_id' => '1',
			'modified' => '2014-11-24 09:25:56'
		),
		array(
			'id' => '8',
			'description' => 'Του είπαμε να μιλήσει με τον Σοφό διότι δεν υπάρχει συμβόλαιο συντήρησης',
			'task_id' => '1652',
			'modified_user_id' => '1',
			'modified' => '2014-11-24 12:39:42'
		),
		array(
			'id' => '9',
			'description' => 'ΕΓΙΝΕ ΣΗΜΕΡΑ 26/11/2015 ΤΑ ΕΣΤΕΙΛΑ ΣΤΟ ΛΟΓΙΣΤΗ',
			'task_id' => '1661',
			'modified_user_id' => '3',
			'modified' => '2014-11-26 12:28:28'
		),
		array(
			'id' => '10',
			'description' => 'Το πρόβλημα οφείλετε στο ότι πατάει "Αλλαγή διανομέα" και μετά "Cancel" Το ποσό αντί για τον delivery χρεώνεται στο ταμείο.',
			'task_id' => '1658',
			'modified_user_id' => '1',
			'modified' => '2014-11-26 16:29:26'
		),
	);

}
