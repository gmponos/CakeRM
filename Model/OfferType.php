<?php
App::uses('AppModel', 'Model');

/**
 * OfferType Model
 *
 * @property Offer $Offer
 */
class OfferType extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'type';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'type' => [
			'notBlank' => [
				'rule' => ['notBlank'],
			],
		],
		'order' => [
			'numeric' => [
				'rule' => ['numeric'],
				'message' => 'The order field must be a digit',
				'allowEmpty' => true,
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
			'foreignKey' => 'type_id',
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
