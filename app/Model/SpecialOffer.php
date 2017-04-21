<?php
App::uses('AppModel', 'Model');
/**
 * SpecialOffer Model
 *
 * @property SpecialOffer $ParentSpecialOffer
 * @property House $House
 * @property SpecialOffer $ChildSpecialOffer
 * @property Portal $Portal
 */
class SpecialOffer extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentSpecialOffer' => array(
			'className' => 'SpecialOffer',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'House' => array(
			'className' => 'House',
			'foreignKey' => 'house_id',
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
		'ChildSpecialOffer' => array(
			'className' => 'SpecialOffer',
			'foreignKey' => 'parent_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Portal' => array(
			'className' => 'Portal',
			'joinTable' => 'portals_special_offers',
			'foreignKey' => 'special_offer_id',
			'associationForeignKey' => 'portal_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
