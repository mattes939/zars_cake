<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OrdersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    /**
     * index method
     *
     * @return void
     */
    public function index($status = null) {
//            ini_set('memory_limit', '-1');
//            ini_set('max_execution_time', 0);
//            $orders = [];
//            $i = 0;
//            foreach($this->Order->objednavka as $objednavka){
//                $orders[$i]['Order']['id'] = $objednavka['id'];
//                $orders[$i]['Order']['order_status_id'] = $objednavka['stav']+1;
//                if($this->Order->House->exists($objednavka['ido'])){
//                    $orders[$i]['Order']['house_id'] = $objednavka['ido'];
//                }
//                
//                $user = $this->Order->User->find('first', [
//                    'conditions' => ['zakaznik' => $objednavka['idz']],
//                    'fields' => ['id', 'zakaznik']
//                ]);
//                if(!empty($user)){
//                    $orders[$i]['Order']['user_id'] = $user['User']['id'];
//                }
//                
//                if($objednavka['datum']!=0){
//                    $orders[$i]['Order']['travel_date_id'] = $objednavka['datum'];
//                }
//                $orders[$i]['Order']['animals'] = $objednavka['zvire'];
//                $orders[$i]['Order']['animals_details'] = $objednavka['zvirejake'];
//                $orders[$i]['Order']['employer_contribution'] = $objednavka['prispevek'];
//                $orders[$i]['Order']['attendants'] = $objednavka['pocetosob'];
//                $orders[$i]['Order']['adults'] = $objednavka['dospeli'];
//                $orders[$i]['Order']['young'] = $objednavka['mladez'];
//                $orders[$i]['Order']['children'] = $objednavka['deti'];
//                $orders[$i]['Order']['comment'] = $objednavka['text'];
//                $orders[$i]['Order']['created'] = $objednavka['datumobjednavky'];
//                $orders[$i]['Order']['code'] = $objednavka['prcislo'];
//                $orders[$i]['Order']['confirmed'] = $objednavka['potvrzenadne'];
//                $orders[$i]['Order']['canceled'] = $objednavka['stornovanadne'];
//                $orders[$i]['Order']['pp'] = $objednavka['pp'];
//                $orders[$i]['Order']['company_id'] = $objednavka['cac'];
//                $orders[$i]['Order']['start_day'] = $objednavka['datumnastup'];
//                $orders[$i]['Order']['end_day'] = $objednavka['datumukonceni'];
//                $orders[$i]['Order']['start_time'] = $objednavka['casnastupu'];
//                $orders[$i]['Order']['end_time'] = $objednavka['casukonceni'];
//                $orders[$i]['Order']['customer_date'] = $objednavka['terminzakaznik'];
//                $orders[$i]['Order']['price'] = $objednavka['cena'];
//                $orders[$i]['Order']['discount'] = $objednavka['sleva'];
//                $orders[$i]['Order']['final_price'] = $objednavka['vyslednacena'];
//                $orders[$i]['Order']['provision'] = $objednavka['provizeprocenta']/100;
//                $orders[$i]['Order']['provision_reg'] = $objednavka['provizeregprocenta']/100;
//                $orders[$i]['Order']['notes'] = $objednavka['poznamka'];
//                $orders[$i]['Order']['billing_price'] = $objednavka['fakturacnicena'];
//                $i++;
//            }
//            debug($this->Order->saveMany($orders));
//		$this->Order->recursive = 0;
        $orders = $this->Order->find('all', [
            'conditions' => [
                'house_id IS NOT NULL',
                'travel_date_id IS NOT NULL',
            ],
            'fields' => ['id', 'Order.house_id', 'Order.travel_date_id', 'Order.house_date_id'],
        ]);
//            foreach ($orders as $i => $order){
//                $houseDate = $this->Order->HouseDate->find('first', [
//                    'conditions' => [
//                        'travel_date_id' => $order['Order']['travel_date_id'],
//                        'house_id' => $order['Order']['house_id']
//                    ],
//                    'fields' => ['id']
//                ]);
//                $orders[$i]['Order']['house_date_id'] = $houseDate['HouseDate']['id'];
//            }

        debug($orders);
        die;
//            $this->Order->saveMany($orders);
        $this->set(compact('orders'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($houseDateId = null) {
        $houseDate = $this->Order->HouseDate->find('first', [
            'conditions' => ['HouseDate.id' => $houseDateId],
            'contain' => [
                'House' => [
                    'fields' => ['slug', 'id']
                ]
            ]
        ]);

        if ($houseDate['HouseDate']['date_condition_id'] != 1) {
            throw new ForbiddenException(__('Neplatná objednávka'));
        }
        if ($this->request->is('post')) {
            $this->request->data['Order']['house_date_id'] = $houseDateId;
//debug($this->request->data);
//die;
//                        $this->Order->makeOrder($this->request->data);
            if ($this->Order->make($this->request->data)) {
                $email = new CakeEmail('smtp');
                $email->to('test@propojto.cz')
//                        ->viewVars(['order' => $order])
//                        ->helpers(['Html', 'Time'])
                        ->emailFormat('text')
//                        ->template('customer_confirmation', 'default')
                        ->subject('ZARS - nová objednávka');
                $email->send('Nová objednávka na portálu zars');
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(array('controller' => 'houses', 'action' => 'finished', $houseDate['House']['slug']));
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
//        $depositTypes = $this->Order->Deposit->Deposit
        $countries = $this->Order->User->Address->Country->find('list');
        $this->set(compact('countries'));
//		$companies = $this->Order->Company->find('list');
//		$users = $this->Order->User->find('list');
//		$houses = $this->Order->House->find('list');
//		$travelDates = $this->Order->TravelDate->find('list');
//		$this->set(compact('companies', 'users', 'houses', 'travelDates'));
    }

    public function finished($slug = null) {
        $this->set(compact('slug'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Order->save($this->request->data)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
            $this->request->data = $this->Order->find('first', $options);
        }
        $companies = $this->Order->Company->find('list');
        $users = $this->Order->User->find('list');
        $houses = $this->Order->House->find('list');
        $travelDates = $this->Order->TravelDate->find('list');
        $this->set(compact('companies', 'users', 'houses', 'travelDates'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Order->delete()) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index($status = 1) {
//		$this->Order->recursive = 0;
        $contain = [
            'HouseDate' => [
                'TravelDate',
                'House'
            ],
            'User',
            'Deposit' => [
                'DepositType'
            ]
        ];
        $this->Paginator->settings = [
            'order' => [
                'created' => 'DESC'
            ],
            'conditions' => [
                'order_status_id' => $status
            ],
            'contain' => $contain
        ];
        $this->set('orders', $this->Paginator->paginate());
        $this->set(compact('status'));
        
        if ($status == 1) {
            $newOrders = $this->Order->find('all', [
                'conditions' => [
                    'order_status_id' => $status,
                    'confirmed' => null
                ],
                'order' => [
                    'Order.created' => 'DESC'
                ],
                'contain' => $contain
            ]);

            $overdueOrders = $this->Order->overdueOrders();

            $this->set(compact('newOrders', 'overdueOrders'));
            $this->render('admin_active_orders');
        }
//            
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Order->create();
            if ($this->Order->save($this->request->data)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $companies = $this->Order->Company->find('list');
        $users = $this->Order->User->find('list');
        $houses = $this->Order->House->find('list');
        $travelDates = $this->Order->TravelDate->find('list');
        $this->set(compact('companies', 'users', 'houses', 'travelDates'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if (empty($this->request->data['Order']['confirmed'])) {
                $saved = $this->Order->confirm($this->request->data);
            } else {
//                debug($this->request->data);die;
                $saved = $this->Order->saveAll($this->request->data, ['deep' => true]);
//                debug($saved);die;
            }
            if ($saved) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(array('action' => 'edit', $id));
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        } else {

            $this->request->data = $this->Order->find('first', [
                'conditions' => ['Order.id' => $id],
                'contain' => [
                    'HouseDate' => [
                        'House' => [
                            'User'
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
//            debug($this->request->data);
        }
        $companies = $this->Order->Company->find('list');
        $users = $this->Order->User->find('list');
        $houses = $this->Order->HouseDate->House->find('list', [
            'fields' => ['id', 'full_name'],
            'order' => ['name' => 'asc']
        ]);
        $travelDates = $this->Order->HouseDate->TravelDate->find('list');
        $countries = $this->Order->User->Address->Country->find('list');
        $depositTypes = $this->Order->Deposit->DepositType->find('list');



        $this->set(compact('companies', 'users', 'houses', 'travelDates', 'countries', 'depositTypes', 'id'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post', 'delete');
//        debug($this->Order->field('house_date_id'));
        $this->Order->HouseDate->setCondition($this->Order->field('house_date_id'), 1);
//        die;
        if ($this->Order->delete()) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_confirm($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post');
        if ($this->Order->confirm($id)) {
            $this->Flash->success(__('Objednávka potvrzena'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_cancel($id = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $this->request->allowMethod('post');
        if ($this->Order->cancel($id)) {
            $this->Flash->success(__('Objednávka stornována'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_confirmation($id = null, $param = null) {
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        $order = $this->Order->find('first', [
            'conditions' => ['Order.id' => $id],
            'contain' => [
                'User' => [
                    'Address'
                ],
                'Company',
                'Deposit' => [
                    'order' => ['deposit_type_id' => 'ASC'],
                    'DepositType'
                ],
                'HouseDate' => [
                    'House' => [
                        'User'
                    ]
                ]
            ]
        ]);
        $this->set(compact('order'));
        $this->layout = 'simple';
//        debug($order);
        switch ($param) {
            case 'platba-email':
                $this->autoRender = false;
                $email = new CakeEmail('smtp');
                $email->to($order['User']['email'], $order['User']['full_name'])
                        ->viewVars(['order' => $order])
                        ->helpers(['Html', 'Time'])
                        ->emailFormat('html')
                        ->template('customer_confirmation', 'default')
                        ->subject('Potvrzení objednávky - výzva k platbě');
                $email->send();
                $this->Order->updateAll(['Order.customer_confirmation_sent' => 'CURDATE()'], ['Order.id' => $id]);
                $this->Flash->set('Potvrzení odesláno.');
                return $this->redirect(['action' => 'edit', $id]);
//                break;
            case 'platba':
                $this->render('admin_customer_confirmation', 'simple');
                break;
            case 'zars':
                $this->render('admin_customer_confirmation_zars', 'simple');
                break;

            case 'poukaz-tisk':
                $properties = $this->Order->HouseDate->House->Value->Property->find('all', [
                    'order' => ['Property.order' => 'ASC'],
                    'contain' => [
                        'Value' => ['conditions' => ['house_id' => $order['HouseDate']['house_id']]]
                    ]
                ]);
                $this->set(compact('properties'));
                $this->render('admin_coupon');
            case 'majitel':
                $this->render('admin_confirmation_owner');
                break;
            case 'majitel-email':
                break;
        }
    }

    public function admin_changeStatus($id = null, $status = 1){
        $this->autoRender = false;
        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid order'));
        }
        
        if($this->Order->updateAll(['Order.status' => $status], ['Order.id' => $id])){
            return $this->redirect($this->referer());
        }
    }
}
