<?php
App::uses('AppModel', 'Model');
/**
 * TravelDateType Model
 *
 * @property TravelDate $TravelDate
 */
class TravelDateType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = [
		'TravelDate' => [
			'className' => 'TravelDate',
			'foreignKey' => 'travel_date_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		]
	];

}
