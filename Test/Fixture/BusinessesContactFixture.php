<?php
/**
 * BusinessesContact Fixture
 */
class BusinessesContactFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'business_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'contact_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('business_id', 'contact_id'), 'unique' => 1),
			'fk_businesses_has_contacts_contacts1_idx' => array('column' => 'contact_id', 'unique' => 0),
			'fk_businesses_has_contacts_businesses1_idx' => array('column' => 'business_id', 'unique' => 0)
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
			'business_id' => '1',
			'contact_id' => '1'
		),
		array(
			'business_id' => '2',
			'contact_id' => '2'
		),
		array(
			'business_id' => '3',
			'contact_id' => '3'
		),
		array(
			'business_id' => '5',
			'contact_id' => '4'
		),
		array(
			'business_id' => '8',
			'contact_id' => '5'
		),
		array(
			'business_id' => '9',
			'contact_id' => '5'
		),
		array(
			'business_id' => '69',
			'contact_id' => '6'
		),
		array(
			'business_id' => '332',
			'contact_id' => '9'
		),
		array(
			'business_id' => '23',
			'contact_id' => '10'
		),
		array(
			'business_id' => '24',
			'contact_id' => '11'
		),
	);

}
