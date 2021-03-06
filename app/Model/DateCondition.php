<?php
App::uses('AppModel', 'Model');
/**
 * DateCondition Model
 *
 * @property HousesTravelDate $HousesTravelDate
 */
class DateCondition extends AppModel {

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
		'HousesTravelDate' => [
			'className' => 'HousesTravelDate',
			'foreignKey' => 'date_condition_id',
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
