<?php
App::uses('AppModel', 'Model');
/**
 * HouseDate Model
 *
 * @property House $House
 * @property TravelDate $TravelDate
 * @property DateCondition $DateCondition
 * @property UnavailableDay $UnavailableDay
 */
class HouseDate extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'House' => array(
			'className' => 'House',
			'foreignKey' => 'house_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TravelDate' => array(
			'className' => 'TravelDate',
			'foreignKey' => 'travel_date_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DateCondition' => array(
			'className' => 'DateCondition',
			'foreignKey' => 'date_condition_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'UnavailableDay' => array(
			'className' => 'UnavailableDay',
			'foreignKey' => 'house_date_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

        
}
