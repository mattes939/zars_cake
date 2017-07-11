<?php
App::uses('AppModel', 'Model');
/**
 * Area Model
 *
 * @property Selection $Selection
 * @property Article $Article
 * @property House $House
 * @property Region $Region
 */
class Area extends AppModel {

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
		'Selection' => [
			'className' => 'Selection',
			'foreignKey' => 'area_id',
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
		'Article' => [
			'className' => 'Article',
			'joinTable' => 'areas_articles',
			'foreignKey' => 'area_id',
			'associationForeignKey' => 'article_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		],
		'House' => [
			'className' => 'House',
			'joinTable' => 'areas_houses',
			'foreignKey' => 'area_id',
			'associationForeignKey' => 'house_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		],
		'Region' => [
			'className' => 'Region',
			'joinTable' => 'areas_regions',
			'foreignKey' => 'area_id',
			'associationForeignKey' => 'region_id',
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
