<?php
/**
 * Contract Fixture
 */
class ContractFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'business_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'contract_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'start' => array('type' => 'date', 'null' => false, 'default' => null),
		'end' => array('type' => 'date', 'null' => false, 'default' => null, 'key' => 'unique'),
		'comments' => array('type' => 'binary', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'id_UNIQUE' => array('column' => 'id', 'unique' => 1),
			'contract_end_UNIQUE' => array('column' => 'end', 'unique' => 1),
			'fk_contracts_contract_types1_idx' => array('column' => 'contract_type_id', 'unique' => 0),
			'fk_contracts_bussinesses1_idx' => array('column' => 'business_id', 'unique' => 0)
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
			'business_id' => '484',
			'contract_type_id' => '1',
			'start' => '2015-10-01',
			'end' => '2015-10-15',
			'comments' => '',
			'created' => '2015-10-11 11:17:16',
			'updated' => '2015-10-11 11:17:16'
		),
	);

}
