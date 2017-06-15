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
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Company' => array(
            'className' => 'Company',
            'foreignKey' => 'company_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Portal' => array(
            'className' => 'Portal',
            'foreignKey' => 'portal_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
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
        'HouseDate' => array(
            'className' => 'HouseDate',
            'foreignKey' => 'house_date_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'OrderStatus' => array(
            'className' => 'OrderStatus',
            'foreignKey' => 'order_status_id',
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
        'Reminder' => array(
            'className' => 'Reminder',
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
        ),
        'Deposit' => array(
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
        )
    );

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
        return $this->saveAll($order);
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

//        $this->generateCode($order['Order']['id'], $order['Order']['created'], $order['Order']['company_id']);
//       debug($order);
//       
//        die;
        return $this->saveAll($order);
    }

    public function generateCode($id, $created, $company) {
        $date = new DateTime($created);

        return $company . $date->format('ymd') . substr($id, -2);

//        return $this->updateAll(['Order.code' => $company . $date->format('ymd') . $id % 100], ['Order.id' => $id]);
    }

    public function beforeSave($options = array()) {
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

//public function afterDelete() {
//    parent::afterDelete();
//    
//     $this->HouseDate->setCondition($this->data[$this->alias]['house_date_id'], 1);
//     
//     return true;
//}
}
