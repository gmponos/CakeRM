<?php
/**
 * BankAccount Fixture
 */
class BankAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'bank_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'bank_account' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'IBAN' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'holdersaccount' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'business' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'created_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'updated_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'bank_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'bank_account_UNIQUE' => array('column' => 'bank_account', 'unique' => 1),
			'IBAN_UNIQUE' => array('column' => 'IBAN', 'unique' => 1),
			'fk_bank_accounts_banks1_idx' => array('column' => 'bank_id', 'unique' => 0)
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
			'bank_id' => '3',
			'active' => 1,
			'bank_account' => '084/620895-93',
			'IBAN' => 'GR4001100840000008462089593',
			'holdersaccount' => 'ΜΠΟΝΟΣ ΓΕΩΡΓΙΟΣ ΤΟΥ ΚΩΝΣΤΑΝΤΙΝΟΥ',
			'business' => 0,
			'created_user_id' => null,
			'updated_user_id' => null,
			'created' => '2014-10-17 10:08:30',
			'updated' => '2014-10-17 10:08:30'
		),
	);

}
