<?php
App::uses('AppModel', 'Model');
/**
 * Region Model
 *
 * @property Country $Country
 * @property District $District
 * @property House $House
 * @property Area $Area
 */
class Region extends AppModel {

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
		'Country' => [
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		]
	];

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = [
		'District' => [
			'className' => 'District',
			'foreignKey' => 'region_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		],
		'House' => [
			'className' => 'House',
			'foreignKey' => 'region_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = [
		'Area' => [
			'className' => 'Area',
			'joinTable' => 'areas_regions',
			'foreignKey' => 'region_id',
			'associationForeignKey' => 'area_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		]
	];

}
