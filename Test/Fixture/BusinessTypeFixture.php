<?php
/**
 * BusinessType Fixture
 */
class BusinessTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'type' => 'ΕΣΤΙΑΤΟΡΙΟ ΚΑΦΕ',
			'modified' => '2013-09-11 19:55:04'
		),
		array(
			'id' => '2',
			'type' => 'ΚΑΤ.ΕΜΠ.ΟΙΚΟΔΟΜΙΚΩΝ.ΕΡΓΩΝ ΠΑΡΑΓΩΓΗ ΦΡΕΣΚΟΥ ΨΩΜΙΟΥ',
			'modified' => '2013-09-11 20:12:39'
		),
		array(
			'id' => '3',
			'type' => 'ΨΗΤΟΠΩΛΕΙΟ - ΕΣΤΙΑΤΟΡΙΟ',
			'modified' => '2013-09-11 20:35:26'
		),
		array(
			'id' => '4',
			'type' => 'ΕΚΜΕΤΑΛΕΥΣΗ ΧΩΡΩΝ ΕΣΤΙΑΣΕΩΣ ΜΟΝ. Ε.Π.Ε.',
			'modified' => '2013-09-11 21:06:17'
		),
		array(
			'id' => '5',
			'type' => 'ΚΥΛΙΚΕΙΟ',
			'modified' => '2013-09-11 21:13:06'
		),
		array(
			'id' => '6',
			'type' => 'ΚΡΕΠΕΡΙ - ΑΝΑΨΥΚΤΙΚΤΗΡΙΟ',
			'modified' => '2013-09-12 06:58:40'
		),
		array(
			'id' => '7',
			'type' => 'ΚΑΦΕ - ΜΠΑΡ',
			'modified' => '2013-09-12 07:58:15'
		),
		array(
			'id' => '8',
			'type' => 'ΕΣΤΙΑΤΟΡΙΟ',
			'modified' => '2013-09-12 10:20:02'
		),
		array(
			'id' => '9',
			'type' => 'ΕΚΜΕΤΑΛΛΕΥΣΗ ΕΣΤΙΑΤΟΡΙΩΝ',
			'modified' => '2013-09-12 12:43:49'
		),
		array(
			'id' => '29',
			'type' => 'ΠΑΡΑΓΩΓΗ ΚΑΙ ΕΜΠΟΡΙΑ ΕΙΔΩΝ ΔΙΑΤΡΟΦΗΣ',
			'modified' => '2013-09-19 11:00:55'
		),
	);

}
