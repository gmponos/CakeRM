<?php

App::uses('AppModel', 'Model');

/**
 * OfferStatus Model
 *
 * @property Offer $Offer
 */
class OfferStatus extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'status';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'status' => [
			'notBlank' => [
				'rule' => ['notBlank'],
				'message' => 'The status field must not be empty',
				'required' => true,
			],
			'unique' => [
				'rule' => ['isUnique'],
				'message' => 'The offer status already exists.',
			],
		],
	];

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = [
		'Offer' => [
			'className' => 'Offer',
			'foreignKey' => 'status_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => '',
		],
	];

}
