<?php

App::uses('AppModel', 'Model');

/**
 * Company Model
 *
 * @property Order $Order
 */
class Company extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $virtualFields = [
        'account' => 'CONCAT(Company.bank_account, "/", Company.bank_code)'
    ];

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'company_id',
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
