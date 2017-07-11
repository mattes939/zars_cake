<?php

App::uses('AppModel', 'Model');

/**
 * Deposit Model
 *
 * @property Order $Order
 * @property DepositType $DepositType
 */
class Deposit extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'price';


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = [
        'Order' => [
            'className' => 'Order',
            'foreignKey' => 'order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'DepositType' => [
            'className' => 'DepositType',
            'foreignKey' => 'deposit_type_id',
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
        'Reminder' => [
            'className' => 'Reminder',
            'foreignKey' => 'deposit_id',
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
    ];

    public function initialize($deposit, $confirmed, $startDate, $billingPrice) {
        $diff = $startDate->diff($confirmed, false)->days;

        if ($diff > 41) {
            $deposit[0]['price'] = $billingPrice / 2;
            $deposit[2]['price'] = $billingPrice / 2;

            $fromConfirmed = $confirmed->modify('+ 7 days');
            $fromStartDate = $startDate->modify('- 42 days');
            if ($fromConfirmed < $fromStartDate) {
                $deposit[0]['maturity'] = $fromConfirmed->format('Y-m-d');
                $deposit[2]['maturity'] = $fromStartDate->format('Y-m-d');
            } else {
                $deposit[0]['maturity'] = $fromStartDate->format('Y-m-d');
                $deposit[2]['maturity'] = $fromConfirmed->format('Y-m-d');
            }
        } else {
            $deposit[2]['price'] = $billingPrice;
            $deposit[2]['maturity'] = $confirmed->modify('+ 3 days')->format('Y-m-d');
        }
//        debug($diff);

        return $deposit;
    }

}
