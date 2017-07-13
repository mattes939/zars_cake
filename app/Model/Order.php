<?php

App::uses('AppModel', 'Model');

/**
 * Order Model
 *
 * @property Company $Company
 * @property User $User
 * @property House $House
 * @property TravelDate $TravelDate
 * @property Reminder $Reminder
 */
class Order extends AppModel {
    
//    public $actsAs = array('AuditLog.Auditable');
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = [
        'Company' => [
            'className' => 'Company',
            'foreignKey' => 'company_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'Portal' => [
            'className' => 'Portal',
            'foreignKey' => 'portal_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'User' => [
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
//        'House' => array(
//            'className' => 'House',
//            'foreignKey' => 'house_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        ),
//        'TravelDate' => array(
//            'className' => 'TravelDate',
//            'foreignKey' => 'travel_date_id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        ),
        'HouseDate' => [
            'className' => 'HouseDate',
            'foreignKey' => 'house_date_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'OrderStatus' => [
            'className' => 'OrderStatus',
            'foreignKey' => 'order_status_id',
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
        'Deposit' => [
            'className' => 'Deposit',
            'foreignKey' => 'order_id',
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

    public function make($order) {

        $order['User']['email'] = trim($order['User']['email']);
        $order['User']['group_id'] = 5;

        $this->User->hideOldCustomers($order['User']['email']);
        $this->HouseDate->setCondition($order['Order']['house_date_id'], 2);


//        $order['Deposit'][0]['maturity'] = 0;
//        debug($order);die;
        $this->create();
        $order['Deposit'][1]['deposit_type_id'] = 1;
        $order['Deposit'][2]['deposit_type_id'] = 2;
        $order['Deposit'][3]['deposit_type_id'] = 3;
//        $order['Deposit'][1]['order_id'] = $this->id;
//        $order['Deposit'][2]['order_id'] = $this->id;
//        $order['Deposit'][3]['order_id'] = $this->id;
//        debug($order);
//        die;
        return $this->saveAll($order, ['deep' => true]);
    }

    public function cancel($id) {
        $order = $this->find('first', [
            'conditions' => ['id' => $id],
            'fields' => ['house_date_id']
        ]);
//        debug($order);
//        die;
        $this->HouseDate->setCondition($order['Order']['house_date_id'], 1);
        return $this->updateAll(['Order.order_status_id' => 2], ['Order.id' => $id]);
    }

    public function confirm($order) {
        $days = $this->HouseDate->TravelDate->find('first', [
            'conditions' => ['id' => $order['HouseDate']['travel_date_id']],
            'fields' => ['start', 'end']
        ]);
        if (empty($order['Order']['start_day'])) {
            $order['Order']['start_day'] = $days['TravelDate']['start'];
        }
        if (empty($order['Order']['end_day'])) {
            $order['Order']['end_day'] = $days['TravelDate']['end'];
        }
        $hours = $this->HouseDate->House->Value->find('all', [
            'conditions' => [
                'house_id' => $order['HouseDate']['house_id'],
                'property_id' => [266, 267]
            ],
            'order' => [
                'property_id' => 'ASC'
            ],
            'fields' => ['switch', 'value']
        ]);
//        debug($hours);
        if (empty($order['Order']['start_time'])) {
            if ($hours[0]['Value']['switch']) {
                $order['Order']['start_time'] = '15:00 - 16:00';
            } elseif ($hours[1]['Value']['switch']) {
                $order['Order']['start_time'] = $hours[1]['Value']['value'];
            }
        }

//        $confirmed = date('Y-m-d H:i:s');
        $confirmed = new DateTime();
        $order['Order']['confirmed'] = $confirmed->format('Y-m-d H:i:s');

//        $diff = strtotime($order['Order']['start_day']) - strtot
        $startDate = new DateTime($order['Order']['start_day']);

//         debug($order);
        $order['Deposit'] = $this->Deposit->initialize($order['Deposit'], $confirmed, $startDate, $order['Order']['billing_price']);
        $ownerDeadline = new DateTime($order['Order']['start_day']);
        $order['Order']['owner_deadline'] = $ownerDeadline->modify('-36 days')->format('Y-m-d');

//        $this->generateCode($order['Order']['id'], $order['Order']['created'], $order['Order']['company_id']);
//       debug($order);
//       
//        die;
        return $this->saveAll($order, ['deep' => true]);
    }

    public function generateCode($id, $created, $company) {
        $date = new DateTime($created);

        return $company . $date->format('ymd') . substr($id, -2);

//        return $this->updateAll(['Order.code' => $company . $date->format('ymd') . $id % 100], ['Order.id' => $id]);
    }

    public function beforeSave($options = []) {
        parent::beforeSave($options);

        if ($this->id) {
//            debug($this->id);
            $this->old = $this->find('first', [
                'conditions' => [
                    $this->primaryKey => $this->id
                ]
            ]);
//            debug($this->old);
//            die;
            if (
                    $this->old[$this->alias]['company_id'] != $this->data[$this->alias]['company_id'] ||
                    empty($this->old[$this->alias]['code'])
            ) {
                $this->data[$this->alias]['code'] = $this->generateCode($this->id, $this->data[$this->alias]['confirmed'], $this->data[$this->alias]['company_id']);
            }
        }

        return true;
    }

    public function overdueOrders() {
        $orders = $this->find('all', [
            'conditions' => [
                'order_status_id' => 1,
                'NOT' => [
                    'confirmed' => null
                ]
            ],
            'order' => [
                'confirmed' => 'ASC'
            ],
            'contain' => [
                'HouseDate' => [
                    'TravelDate' => ['fields' => ['name']],
                    'House' => [
                        'fields' => ['full_name']
                    ]
                ],
                'User' => [
                    'fields' => ['full_name']
                ],
                'Deposit' => [
                    'DepositType',
                    'Reminder' => [
                        'ReminderType'
                    ],
                ],
            ]
        ]);
        $processedOrders = [];
        foreach ($orders as $o => $order) {
            $depositOverdue = false;
            foreach ($order['Deposit'] as $d => $deposit) {
                if (!empty($deposit['maturity']) && empty($deposit['pay_date'])) {
                    $maturity = new DateTime($deposit['maturity'] . '23:59:59');
//                    $diff = $maturity->diff(new DateTime());
                    if ($maturity < new DateTime()) {
                        $order['Deposit'][$d]['overdue'] = $maturity->diff(new DateTime())->d;
                        $depositOverdue = true;
                    }
//                    debug($diff);
//                    if ($diff->format('%R%a') > 0) {
//                        $order['Deposit'][$d]['overdue'] =  $diff->d;
//                        $depositOverdue = true;
//                    }
                }
            }
//            debug($depositOverdue);
            if ($depositOverdue) {
                $processedOrders['depositOverdue'][] = $order;
//                $depositOverdue = false;
            }

            $deadline = new DateTime($order['Order']['owner_deadline'] . '23:59:59');
            if ($deadline < new DateTime()) {
                $order['Order']['owner_overdue'] = $deadline->diff(new DateTime())->d;
                $processedOrders['ownerOverdue'][] = $order;
            }
        }
//        die;
//        $processedOrders['all'] = $orders;
        return $processedOrders;
//        debug($processedOrders);
//        die;
    }

    public function getOrder($id = null) {
        $order = $this->find('first', [
            'conditions' => ['Order.id' => $id],
            'contain' => [
                'HouseDate' => [
                    'House' => [
                        'User',
                    ],
                    'TravelDate'
                ],
                'User' => [
                    'Address' => [
                        'Country'
                    ]
                ],
                'Company',
                'Deposit' => [
                    'order' => ['deposit_type_id' => 'ASC']
                ]
            ]
        ]);

        if (empty($order['Order']['confirmed'])) {
            $order = $this->defaultPrice($order);
        }

//        debug($order);
//        die;
        return $order;
    }

    public function defaultPrice($order) {
        $defaultDate = $order['Order']['start_day'] == $order['HouseDate']['TravelDate']['start'] && $order['Order']['end_day'] == $order['HouseDate']['TravelDate']['end'];

        $price = $this->HouseDate->House->Price->find('first', [
            'condition' => [
                'house_id' => $order['HouseDate']['house_id'],
                'travel_date_type_id' => $order['HouseDate']['TravelDate']['travel_date_type_id']
            ]
        ]);

        switch ($order['HouseDate']['House']['pricelist_id']) {
            case 1:
                if ($defaultDate) {
                    $order['Order']['owner_total'] = $price['Price']['owner_basic'];
                    $order['Order']['price'] = $price['Price']['customer_basic'];
                } else {
                    $end = new DateTime($order['Order']['end_day']);
                    $days = $end->diff(new DateTime($order['Order']['start_day']))->d;
                    $order['Order']['owner_total'] = $price['Price']['owner_extra'] * $days;
                    $order['Order']['price'] = $price['Price']['customer_extra'] * $days;
                }

                break;
            case 2:
                if ($defaultDate) {
                    if ($order['Order']['attendants'] <= $price['Price']['treshold']) {
                        $order['Order']['owner_total'] = $price['Price']['owner_basic'];
                        $order['Order']['price'] = $price['Price']['customer_basic'];
                    } else {
                        $order['Order']['owner_total'] = $price['Price']['owner_beyond_basic'];
                        $order['Order']['price'] = $price['Price']['customer_beyond_basic'];
                    }
                } else {
                    $end = new DateTime($order['Order']['end_day']);
                    $days = $end->diff(new DateTime($order['Order']['start_day']))->d;
                    if ($order['Order']['attendants'] <= $price['Price']['treshold']) {
                        $order['Order']['owner_total'] = $price['Price']['owner_extra'] * $days;
                        $order['Order']['price'] = $price['Price']['customer_extra'] * $days;
                    } else {
                        $order['Order']['owner_total'] = $price['Price']['owner_beyond_extra'] * $days;
                        $order['Order']['price'] = $price['Price']['customer_beyond_extra'] * $days;
                    }
                }
                break;
            case 3:
                if ($defaultDate) {

                    $order['Order']['owner_total'] = $price['Price']['owner_basic'];
                    $order['Order']['price'] = $price['Price']['customer_basic'];

                    if ($order['Order']['attendants'] > $price['Price']['treshold']) {
                        $order['Order']['owner_total'] += $price['Price']['owner_beyond_basic'] * ($order['Order']['attendants'] - $price['Price']['treshold']);
                        $order['Order']['price'] += $price['Price']['customer_beyond_basic'] * ($order['Order']['attendants'] - $price['Price']['treshold']);
                    }
                } else {
                    $end = new DateTime($order['Order']['end_day']);
                    $days = $end->diff(new DateTime($order['Order']['start_day']))->d;
                    $order['Order']['owner_total'] = $price['Price']['owner_extra'] * $days;
                    $order['Order']['price'] = $price['Price']['customer_extra'] * $days;

                    if ($order['Order']['attendants'] > $price['Price']['treshold']) {
                        $order['Order']['owner_total'] += $price['Price']['owner_beyond_extra'] * ($order['Order']['attendants'] - $price['Price']['treshold']) * $days;
                        $order['Order']['price'] += $price['Price']['customer_beyond_basic'] * ($order['Order']['attendants'] - $price['Price']['treshold']) * $days;
                    }
//                  
                }
                break;
            case 4:
                if ($defaultDate) {
                    $order['Order']['owner_total'] = $price['Price']['owner_basic'] * $order['Order']['attendants'];
                    $order['Order']['price'] = $price['Price']['customer_basic'] * $order['Order']['attendants'];
                } else {
                    $end = new DateTime($order['Order']['end_day']);
                    $days = $end->diff(new DateTime($order['Order']['start_day']))->d;
                    $order['Order']['owner_total'] = $price['Price']['owner_extra'] * $days * $order['Order']['attendants'];
                    $order['Order']['price'] = $price['Price']['customer_extra'] * $days * $order['Order']['attendants'];
                }
                break;
        }

        return $order;
    }

}
