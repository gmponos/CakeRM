<?php

App::uses('AppModel', 'Model');

/**
 * Offer Model
 *
 * @property User        $User
 * @property User        $Responsible
 * @property Contact     $Contact
 * @property Business    $Business
 * @property OfferStatus $OfferStatus
 * @property OfferType   $OfferType
 */
class Offer extends AppModel {

	/**
	 * Set the order
	 *
	 * @var array
	 */
	public $order = [
		//'ISNULL(Offer.accepted) DESC',
		'Offer.updated DESC',
		//'Offer.created DESC',
	];

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'id';

	/**
	 * VirtualFields field
	 *
	 * @var array
	 */
	public $virtualFields = [
		'time_created' => "DATE_FORMAT(Offer.created, '%H:%i')",
		'time_updated' => "DATE_FORMAT(Offer.updated, '%H:%i')",
		'date_created' => "DATE_FORMAT(Offer.created, '%Y-%m-%d')",
		'date_updated' => "DATE_FORMAT(Offer.updated, '%Y-%m-%d')",
		'date_sented' => "DATE_FORMAT(Offer.sented, '%Y-%m-%d')",
		'date_accepted' => "DATE_FORMAT(Offer.accepted, '%Y-%m-%d')",
	];

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = [
		'user_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'status_id' => [
			'numeric' => [
				'rule' => ['numeric'],
			],
		],
		'file' => [
			'english' => [
				'rule' => ['englishFileName'],
				'message' => 'The file must be in english characters',
				'allowEmpty' => true,
			],
			'filetype' => [
				'rule' => [
					'extension', ['rar', 'zip', '7z'],
				],
				'allowEmpty' => true,
				'message' => 'Please supply a compressed file.',
			],
		],
	];

	public $hasMany = [
		'File' => [
			'className' => 'File',
			'foreignKey' => 'offer_id',
			'conditions' => ['alias' => 'Offer'],
			'fields' => '',
			'order' => '',
		],
	];

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = [
		'User' => [
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Responsible' => [
			'className' => 'User',
			'foreignKey' => 'responsible_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'Responsible.fullname',
		],
		'Contact' => [
			'className' => 'Contact',
			'foreignKey' => 'contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'Business' => [
			'className' => 'Business',
			'foreignKey' => 'business_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'OfferStatus' => [
			'className' => 'OfferStatus',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
		'OfferType' => [
			'className' => 'OfferType',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		],
	];

	public function englishFileName($check) {
		$value = array_values($check);
		$value = $value[0]['name'];

		//replace spaces
		$value = str_replace(' ', '_', $value);

		return !preg_match('/[^A-Za-z0-9 ._\-]/', $value);;
	}

	public function beforeSave($options = []) {
		//Save the value date_sented as sented
		if (!empty($this->data['Offer']['date_sented'])) {
			$this->data['Offer']['date_sented'] = $this->data['Offer']['date_sented'];
		}
		if (!empty($this->data['Offer']['date_accepted'])) {
			$this->data['Offer']['date_accepted'] = $this->data['Offer']['date_accepted'];
		}
		if (isset($this->data['Offer']['description'])) {
			//remove spaces from start and end of the description
			$this->data['Offer']['description'] = trim($this->data['Offer']['description']);
			//No accent is allowed in caps letter
			$this->data['Offer']['description'] = str_replace(
				['Ά', 'Έ', 'Ή', 'Ί', 'Ϊ', 'Ό', 'Ύ', 'Ϋ', 'Ώ'], ['Α', 'Ε', 'Η', 'Ι', 'Ι', 'Ο', 'Υ', 'Υ', 'Ω'], $this->data['Offer']['description']);
			//create short description
			$words = explode(' ', $this->data['Offer']['description']);
			if (count($words) > 20) {
				$this->data['Offer']['description_short'] = implode(" ", array_splice($words, 0, 20)) . "...";
			} else {
				$this->data['Offer']['description_short'] = $this->data['Offer']['description'];
			}
		}
		return parent::beforeSave($options);
	}

	/**
	 * after save method
	 *
	 * @param type  $created
	 * @param array $options
	 */
	public function afterSave($created, $options = []) {
		return parent::afterSave($created, $options);
	}

}
