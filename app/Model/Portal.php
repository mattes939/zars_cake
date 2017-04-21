<?php
App::uses('AppModel', 'Model');
/**
 * Portal Model
 *
 * @property House $House
 * @property SpecialOffer $SpecialOffer
 */
class Portal extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'House' => array(
			'className' => 'House',
			'joinTable' => 'houses_portals',
			'foreignKey' => 'portal_id',
			'associationForeignKey' => 'house_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'SpecialOffer' => array(
			'className' => 'SpecialOffer',
			'joinTable' => 'portals_special_offers',
			'foreignKey' => 'portal_id',
			'associationForeignKey' => 'special_offer_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
        
            /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'portal_id',
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
