<?php
/**
 * Business Fixture
 */
class BusinessFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'business' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'firm' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'store' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'business_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'city_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'state_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'phone_one' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'phone_two' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tk' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'afm' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 25, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bank_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true),
		'taxoffice_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'website' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comments' => array('type' => 'binary', 'null' => true, 'default' => null),
		'created_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'updated_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'firm_UNIQUE' => array('column' => 'firm', 'unique' => 1),
			'fk_bussinesses_bussiness_types1_idx' => array('column' => 'business_type_id', 'unique' => 0),
			'fk_bussinesses_cities1_idx' => array('column' => array('city_id', 'state_id'), 'unique' => 0),
			'fk_bussinesses_doys1_idx' => array('column' => 'taxoffice_id', 'unique' => 0)
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
			'active' => 1,
			'business' => 'ΑΓΟΡΑ ΙΛΙΣΙΩΝ ΑΕ',
			'firm' => 'Agora Select',
			'store' => '',
			'business_type_id' => '1',
			'city_id' => '42',
			'state_id' => '1',
			'phone_one' => '2107252252',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΒΕΝΤΗΡΗ 9',
			'tk' => '',
			'afm' => '999636186',
			'bank_account_id' => null,
			'taxoffice_id' => '1',
			'email' => '',
			'website' => 'www.agoraselect.gr',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 16:03:00',
			'updated' => '2014-06-02 14:36:13'
		),
		array(
			'id' => '2',
			'active' => 1,
			'business' => 'ΑΠ. ΤΡΑΣΤΕΛΗΣ & ΣΙΑ ΟΕ',
			'firm' => 'Fuga',
			'store' => '',
			'business_type_id' => null,
			'city_id' => '32',
			'state_id' => '1',
			'phone_one' => '2107242979',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΠΥΡΩΝΟΣ 5',
			'tk' => '',
			'afm' => '082739896',
			'bank_account_id' => null,
			'taxoffice_id' => null,
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 16:09:57',
			'updated' => '2013-09-26 12:38:54'
		),
		array(
			'id' => '3',
			'active' => 1,
			'business' => 'ΒΟΥΓΟΓΙΑΝΝΟΠΟΥΛΟΣ Φ. - ΠΑΥΛΟΥ ΤΥΡΟΣ Ι. Ο.Ε.',
			'firm' => 'Momento',
			'store' => '',
			'business_type_id' => '5',
			'city_id' => '5',
			'state_id' => '1',
			'phone_one' => '2105750987',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΚΡΕΣΝΑΣ 82',
			'tk' => '',
			'afm' => '998275041',
			'bank_account_id' => null,
			'taxoffice_id' => '6',
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 16:46:25',
			'updated' => '2013-09-27 09:20:07'
		),
		array(
			'id' => '4',
			'active' => 1,
			'business' => 'Ε.ΠΕ.ΚΑΤ. Α.Ε.',
			'firm' => 'Φούρνος Λιόσια',
			'store' => '',
			'business_type_id' => null,
			'city_id' => '4',
			'state_id' => '1',
			'phone_one' => '2102486745',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΦΥΛΗΣ 94',
			'tk' => '',
			'afm' => '998771583',
			'bank_account_id' => null,
			'taxoffice_id' => '2',
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 16:49:39',
			'updated' => '2014-01-08 12:07:55'
		),
		array(
			'id' => '5',
			'active' => 1,
			'business' => 'Brand it',
			'firm' => 'Brand it',
			'store' => '',
			'business_type_id' => null,
			'city_id' => '5',
			'state_id' => '1',
			'phone_one' => '2105753348',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΦΙΛΙΚΩΝ 62',
			'tk' => '',
			'afm' => '',
			'bank_account_id' => null,
			'taxoffice_id' => null,
			'email' => '',
			'website' => 'www.brandit.gr',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 17:36:11',
			'updated' => '2014-02-04 14:34:15'
		),
		array(
			'id' => '6',
			'active' => 1,
			'business' => 'ΜΠΙΦΤΕΚΑΚΙΑ & ΣΟΥΒΛΑΚΙΑ ΚΗΦ ΕΠΕ',
			'firm' => 'ΜΠΙΦΤΕΚΑΚΙΑ & ΣΟΥΒΛΑΚΙΑ ΚΗΦΙΣΙΑ',
			'store' => '',
			'business_type_id' => null,
			'city_id' => '6',
			'state_id' => '1',
			'phone_one' => '2108001036',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΙΛΙΣΙΩΝ 26',
			'tk' => '',
			'afm' => '',
			'bank_account_id' => null,
			'taxoffice_id' => null,
			'email' => 'info@biftekakiasouvlakia.gr',
			'website' => 'http://www.biftekakiasouvlakia.gr/',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 17:41:06',
			'updated' => '2013-10-17 11:20:21'
		),
		array(
			'id' => '7',
			'active' => 1,
			'business' => 'ΜΠΑΝΤΑΒΑΝΗΣ ΣΤΑΥΡΟΣ & ΣΙΑ Ε.Ε',
			'firm' => 'Vromiko (Ψυρρή)',
			'store' => '',
			'business_type_id' => '33',
			'city_id' => '42',
			'state_id' => '1',
			'phone_one' => '2103226833',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΚΡΙΕΖΗ  ΣΑΡΡΗ 36',
			'tk' => '',
			'afm' => '998346831',
			'bank_account_id' => null,
			'taxoffice_id' => '15',
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 17:45:03',
			'updated' => '2013-09-19 15:23:33'
		),
		array(
			'id' => '8',
			'active' => 1,
			'business' => 'ΠΛΟΣΚΑΣ ΕΥΡ. ΚΩΝΣΤΑΝΤΙΝΟΣ',
			'firm' => 'Toy Stories',
			'store' => '',
			'business_type_id' => '7',
			'city_id' => '5',
			'state_id' => '1',
			'phone_one' => '2105780215',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΘΕΟΦΡΑΣΤΟΥ 7Α',
			'tk' => '',
			'afm' => '043463737',
			'bank_account_id' => null,
			'taxoffice_id' => '6',
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 18:11:30',
			'updated' => '2013-09-24 13:50:55'
		),
		array(
			'id' => '9',
			'active' => 1,
			'business' => 'ΠΛΟΣΚΑΣ ΚΩΝΣΤΑΝΤΙΝΟΣ',
			'firm' => 'Ναργιλές (Περιστέρι)',
			'store' => '',
			'business_type_id' => '41',
			'city_id' => '5',
			'state_id' => '1',
			'phone_one' => '2105730695',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΕΡΥΘΡΑΙΑΣ 19',
			'tk' => '',
			'afm' => '043463737',
			'bank_account_id' => null,
			'taxoffice_id' => '6',
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 18:12:04',
			'updated' => '2013-09-24 13:38:41'
		),
		array(
			'id' => '10',
			'active' => 1,
			'business' => 'ΣΟΥΛΗ Φ. & ΣΙΑ Ο.Ε.',
			'firm' => 'Vromiko (Χαιδάρι)',
			'store' => '',
			'business_type_id' => '32',
			'city_id' => '3',
			'state_id' => '1',
			'phone_one' => '2105811956',
			'phone_two' => '',
			'fax' => '',
			'address' => 'ΛΕΩΦΟΡΟΣ ΑΘΗΝΩΝ 236',
			'tk' => '',
			'afm' => '998130116',
			'bank_account_id' => null,
			'taxoffice_id' => '9',
			'email' => '',
			'website' => '',
			'comments' => '',
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2013-09-17 18:47:27',
			'updated' => '2013-09-19 15:12:28'
		),
	);

}
