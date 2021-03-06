<?php
App::uses('AppModel', 'Model');
/**
 * Room Model
 *
 * @property House $House
 */
class Room extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = [
		'House' => [
			'className' => 'House',
			'foreignKey' => 'house_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
	];
       }
