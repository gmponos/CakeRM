<?php
/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'verified' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'token' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'token_email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'token_email_expires' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'firstname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'lastname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cellphone' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'bank_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false),
		'calendar_background_color' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'calendar_font_color' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'comments' => array('type' => 'binary', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'group_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'username_UNIQUE' => array('column' => 'username', 'unique' => 1),
			'fk_users_groups1_idx' => array('column' => 'group_id', 'unique' => 0)
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
			'verified' => 1,
			'username' => 'bonito',
			'password' => '9f22354d7cc566a7aa3df8e2146f2d79b79400f0',
			'group_id' => '1',
			'token' => null,
			'token_email' => 'gu4zreion3',
			'token_email_expires' => '2015-12-19 18:55:54',
			'firstname' => 'Γιώργος',
			'lastname' => 'Μπόνος',
			'email' => 'gmponos@gmail.com',
			'phone' => '2112132683',
			'cellphone' => '6983884605',
			'bank_account_id' => '1',
			'calendar_background_color' => '#990000',
			'calendar_font_color' => '',
			'comments' => '',
			'created' => '2013-10-17 18:19:00',
			'updated' => '2015-12-18 18:56:10'
		),
		array(
			'id' => '2',
			'active' => 1,
			'verified' => 1,
			'username' => 'zinelis',
			'password' => '9e52df447ebef3f25da32b98d59d90e7519078e3',
			'group_id' => '3',
			'token' => null,
			'token_email' => null,
			'token_email_expires' => null,
			'firstname' => 'Ορέστης',
			'lastname' => 'Ζηνέλης',
			'email' => 'zinelis@gmail.com',
			'phone' => '',
			'cellphone' => '',
			'bank_account_id' => null,
			'calendar_background_color' => '',
			'calendar_font_color' => '',
			'comments' => '',
			'created' => '2013-10-13 21:16:00',
			'updated' => '2015-10-02 19:50:42'
		),
		array(
			'id' => '3',
			'active' => 0,
			'verified' => 1,
			'username' => 'paris',
			'password' => '9e52df447ebef3f25da32b98d59d90e7519078e3',
			'group_id' => '4',
			'token' => null,
			'token_email' => null,
			'token_email_expires' => null,
			'firstname' => 'Πάρης',
			'lastname' => 'Γράτσος',
			'email' => 'parisgratsos@portable.gr',
			'phone' => '',
			'cellphone' => '',
			'bank_account_id' => null,
			'calendar_background_color' => '#333333',
			'calendar_font_color' => '',
			'comments' => '',
			'created' => '2013-09-16 09:05:00',
			'updated' => '2015-05-04 14:22:26'
		),
		array(
			'id' => '4',
			'active' => 0,
			'verified' => 1,
			'username' => 'bejdo',
			'password' => '9e52df447ebef3f25da32b98d59d90e7519078e3',
			'group_id' => '1',
			'token' => null,
			'token_email' => null,
			'token_email_expires' => null,
			'firstname' => 'Μουαρέμ',
			'lastname' => 'Μπέιντο',
			'email' => 'm.bejdo@portable.gr',
			'phone' => '',
			'cellphone' => '6949554317',
			'bank_account_id' => null,
			'calendar_background_color' => '#009900',
			'calendar_font_color' => '',
			'comments' => '',
			'created' => '2013-09-23 11:07:00',
			'updated' => '2015-05-07 09:14:46'
		),
	);

}
