<?php
/**
 * Contact Fixture
 */
class ContactFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'firstname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'lastname' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'contact_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cellphone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'city_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'state_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'bank_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'comments' => array('type' => 'binary', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_contacts_contact_types1_idx' => array('column' => 'contact_type_id', 'unique' => 0),
			'fk_contacts_cities1_idx' => array('column' => array('city_id', 'state_id'), 'unique' => 0),
			'fk_contacts_departments1_idx' => array('column' => 'department_id', 'unique' => 0)
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
			'firstname' => 'Γιάννης',
			'lastname' => 'Δαφνουνέλης',
			'department_id' => null,
			'contact_type_id' => '1',
			'phone' => '',
			'cellphone' => '6946356888',
			'email' => '',
			'city_id' => null,
			'state_id' => null,
			'bank_account_id' => null,
			'comments' => '',
			'created' => '2013-09-17 16:05:37',
			'updated' => '2013-09-27 10:29:31'
		),
		array(
			'id' => '2',
			'firstname' => 'Νικόλας',
			'lastname' => 'Λιάπης',
			'department_id' => null,
			'contact_type_id' => '1',
			'phone' => '',
			'cellphone' => '',
			'email' => '',
			'city_id' => null,
			'state_id' => null,
			'bank_account_id' => null,
			'comments' => '',
			'created' => '2013-09-17 16:11:18',
			'updated' => '2013-09-20 12:35:12'
		),
		array(
			'id' => '3',
			'firstname' => 'Φώτης',
			'lastname' => 'Βουγογιανόπουλος',
			'department_id' => null,
			'contact_type_id' => '2',
			'phone' => '',
			'cellphone' => '',
			'email' => '',
			'city_id' => null,
			'state_id' => null,
			'bank_account_id' => null,
			'comments' => '',
			'created' => '2013-09-17 17:19:18',
			'updated' => '2013-09-20 12:34:07'
		),
		array(
			'id' => '4',
			'firstname' => 'Ρένα',
			'lastname' => 'Σταματίου',
			'department_id' => null,
			'contact_type_id' => null,
			'phone' => '',
			'cellphone' => '6947777348',
			'email' => 'r.stamatiou@brandit.gr',
			'city_id' => null,
			'state_id' => null,
			'bank_account_id' => null,
			'comments' => '',
			'created' => '2013-09-17 17:45:53',
			'updated' => '2014-02-06 07:54:15'
		),
		array(
			'id' => '5',
			'firstname' => 'Κωνσταντίνος',
			'lastname' => 'Πλόσκας',
			'department_id' => null,
			'contact_type_id' => '2',
			'phone' => '',
			'cellphone' => '6977336229',
			'email' => '',
			'city_id' => null,
			'state_id' => null,
			'bank_account_id' => null,
			'comments' => '',
			'created' => '2013-09-17 18:12:35',
			'updated' => '2013-09-24 08:50:31'
		),
	);

}
