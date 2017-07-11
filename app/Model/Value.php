<?php

App::uses('AppModel', 'Model');

/**
 * Value Model
 *
 * @property House $House
 * @property Property $Property
 */
class Value extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'value';


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
        ],
        'Property' => [
            'className' => 'Property',
            'foreignKey' => 'property_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ]
    ];
     }
