<?php
App::uses('AppModel', 'Model');
/**
 * UnavailableDay Model
 *
 * @property HouseDate $HouseDate
 */
class UnavailableDay extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'date';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = [
		'HouseDate' => [
			'className' => 'HouseDate',
			'foreignKey' => 'house_date_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
	];
}
