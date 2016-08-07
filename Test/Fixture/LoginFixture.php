<?php
/**
 * Login Fixture
 */
class LoginFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'browser' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'IP' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'user_id'), 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'fk_log_logins_users1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => '1',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1; rv:27.0) Gecko/20100101 Firefox/27.0',
			'IP' => '130.43.12.239',
			'modified' => '2014-02-15 13:25:43'
		),
		array(
			'id' => '2',
			'user_id' => '1',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1; rv:27.0) Gecko/20100101 Firefox/27.0',
			'IP' => '130.43.12.239',
			'modified' => '2014-02-15 18:44:18'
		),
		array(
			'id' => '3',
			'user_id' => '1',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1; rv:27.0) Gecko/20100101 Firefox/27.0',
			'IP' => '130.43.12.239',
			'modified' => '2014-02-15 22:42:47'
		),
		array(
			'id' => '4',
			'user_id' => '1',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1; rv:27.0) Gecko/20100101 Firefox/27.0',
			'IP' => '130.43.12.239',
			'modified' => '2014-02-16 12:17:10'
		),
		array(
			'id' => '7',
			'user_id' => '5',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1; rv:27.0) Gecko/20100101 Firefox/27.0',
			'IP' => '130.43.12.239',
			'modified' => '2014-02-16 23:29:51'
		),
		array(
			'id' => '8',
			'user_id' => '1',
			'browser' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',
			'IP' => '85.74.125.190',
			'modified' => '2014-02-17 09:28:16'
		),
		array(
			'id' => '9',
			'user_id' => '3',
			'browser' => 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0',
			'IP' => '85.74.125.190',
			'modified' => '2014-02-17 09:49:41'
		),
		array(
			'id' => '10',
			'user_id' => '5',
			'browser' => 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36',
			'IP' => '85.74.125.190',
			'modified' => '2014-02-17 10:09:14'
		),
		array(
			'id' => '12',
			'user_id' => '7',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36',
			'IP' => '85.74.125.190',
			'modified' => '2014-02-17 10:36:06'
		),
		array(
			'id' => '13',
			'user_id' => '7',
			'browser' => 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36',
			'IP' => '85.74.125.190',
			'modified' => '2014-02-17 10:37:49'
		),
	);

}
