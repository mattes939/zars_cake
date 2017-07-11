<?php
App::uses('AppModel', 'Model');
/**
 * Price Model
 *
 * @property House $House
 * @property TravelDateType $TravelDateType
 */
class Price extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'customer_basic';


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
		'TravelDateType' => array(
			'className' => 'TravelDateType',
			'foreignKey' => 'travel_date_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
