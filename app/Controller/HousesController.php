<?php

App::uses('AppController', 'Controller');

/**
 * Houses Controller
 *
 * @property House $House
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class HousesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');
    public $helpers = ['Media.Media'];

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 0);

        $medias = array();
        $i = 0;
//        foreach ($this->House->fotky as $fotka) {
////                $medias[$i]['Media']['ref'] = 'House';
////                $medias[$i]['Media']['ref_id'] = $fotka['cid'];
////                $medias[$i]['Media']['file'] = '/./files/images/houses/' . $fotka['cid'] . '/' . $fotka['adresa'];
////                $medias[$i]['Media']['position'] = $fotka['poradi'];                
//
//            $oldname = '/var/www/dev.5g4.cz/zars/app/webroot/files/fotky/' . $fotka['adresa'];
//            $newname = '/var/www/dev.5g4.cz/zars/app/webroot/files/images//houses/' . $fotka['cid'] . '/' . $fotka['adresa'];
////            rename($oldname, $newname);
//        }
//            $this->autoRender = false;
//		$this->Paginator->settings = ['contain' => ['Area', 'User', 'Region', 'District']];
//		$this->set('houses', $this->Paginator->paginate());
//                $houseList = $this->House->find('list',[
//                    'fields' => ['id', 'area']
//                ]);
//                $houses = array();
//                $i = 0;
//                foreach($houseList as $id => $area){
//                    $houses[$i]['House']['id'] = $id;
//                    $houses[$i]['Area']['Area'][] = $area;
//                            $i++;
//                }
//                debug($this->House->saveAll($houses));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($area = null, $region = NULL, $district = NULL, $slug = NULL) {
//        if (!$this->House->exists($id)) {
//            throw new NotFoundException(__('Invalid house'));
//        }
                    $options = array(
                'conditions' => array('House.slug' => $slug),
                'contain' => [
//                    'User' => ['fields' => ['id', 'username']],
                    'Region' => ['fields' => ['id', 'name']],
                    'District' => ['fields' => ['id', 'name']],
                    'Area',
                    'Value' => [
                        'order' => ['Value.property_id' => 'ASC'],
                        'Property' => [
                            'fields' => ['id', 'name'],
                            'order' => ['property_type_id' => 'ASC'],
                            'PropertyType'
                        ]
                    ],
                    'Room',
                    'Media',
                    'HouseDate' => [
                        'order' => ['travel_date_id' => 'asc'],
                        'TravelDate' => [
                            'conditions' => ['hidden' => false],
                            
                        ],
                        'DateCondition'
                    ],
//                    'SpecialOffer' => [
//                        'Portal'
//                    ]
                ],
            );
        $this->set('house', $this->House->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->House->create();
            if ($this->House->save($this->request->data)) {
                $this->Flash->success(__('The house has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house could not be saved. Please, try again.'));
            }
        }
        $users = $this->House->User->find('list');
        $regions = $this->House->Region->find('list');
        $districts = $this->House->District->find('list');
        $areas = $this->House->Area->find('list');
        $portals = $this->House->Portal->find('list');
        $travelDates = $this->House->TravelDate->find('list');
        $this->set(compact('users', 'regions', 'districts', 'areas', 'portals', 'travelDates'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->House->exists($id)) {
            throw new NotFoundException(__('Invalid house'));
        }
        if ($this->request->is(array('post', 'put'))) {
            debug($this->request->data);
            die;
            if ($this->House->save($this->request->data)) {
                $this->Flash->success(__('The house has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house could not be saved. Please, try again.'));
            }
        } else {

            $options = array(
                'conditions' => array('House.' . $this->House->primaryKey => $id),
                'contain' => [
                    'Area',
                    'District',
                    'User',
                    'HouseDate',
                    'Portal',
                ]
            );
            $this->request->data = $this->House->find('first', $options);
        }
        $users = $this->House->User->find('list');
        $regions = $this->House->Region->find('list');
        $districts = $this->House->District->find('list');
        $areas = $this->House->Area->find('list');
        $portals = $this->House->Portal->find('list');
//		$houseDates = $this->House->HouseDate->find('list');
        $this->set(compact('users', 'regions', 'districts', 'areas', 'portals', 'id'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->House->id = $id;
        if (!$this->House->exists()) {
            throw new NotFoundException(__('Invalid house'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->House->delete()) {
            $this->Flash->success(__('The house has been deleted.'));
        } else {
            $this->Flash->error(__('The house could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $houses = $this->House->find('all', [
            'fields' => ['id', 'name', 'code', 'long_name', 'active', 'created', 'modified'],
            'contain' => [
                'User' => ['fields' => ['id', 'username']],
                'Region' => ['fields' => ['id', 'name']],
                'District' => ['fields' => ['id', 'name']],
            ],
            'Order' => ['name' => 'ASC']
        ]);
//        debug($houses);
//        echo $this->House->recursive;die;
//        $this->set('_serialize', array('houses'));
        $this->set(compact('houses'));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->House->exists($id)) {
            throw new NotFoundException(__('Invalid house'));
        }
        $options = array('conditions' => array('House.' . $this->House->primaryKey => $id));
        $this->set('house', $this->House->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
//            debug($this->request->data);die;
            $this->House->create();
            if ($this->House->saveAll($this->request->data)) {
                $this->Flash->success(__('The house has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house could not be saved. Please, try again.'));
            }
        }
        $users = $this->House->User->find('list', ['conditions' => ['group_id' => 1]]);
        $regions = $this->House->Region->find('list');
        $districts = $this->House->District->find('list');
        $areas = $this->House->Area->find('list');
        $properties = $this->House->Value->Property->find('all', [
            'fields' => ['Property.id', 'Property.name']
        ]);
//        $portals = $this->House->Portal->find('list');
//        $travelDates = $this->House->TravelDate->find('list');
        $this->set(compact('users', 'regions', 'districts', 'areas', 'portals', 'travelDates', 'properties'));
    }
    
    public function admin_attributes($id){
        ini_set('max_input_vars', 2000);
        ini_set('suhosin.post.max_vars', 2000);
        ini_set('suhosin.request.max_vars', 2000);
//        phpinfo();
         if ($this->request->is(array('post', 'put'))) {
//             debug($_POST);
              debug($this->request->data);die;
            if ($this->House->saveAll($this->request->data)) {
                $this->Flash->success(__('The house has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house could not be saved. Please, try again.'));
            }
        } else {
            $options = array(
                'conditions' => array('House.' . $this->House->primaryKey => $id),
                'contain' => [
//                    'User' => ['fields' => ['id', 'username']],
//                    'Region' => ['fields' => ['id', 'name']],
//                    'District' => ['fields' => ['id', 'name']],
//                    'Area',
                    'Value' => [
                        'conditions' => [
//                          'property_id' => [1,2]  
                        ],
                        'order' => ['Value.property_id' => 'ASC'],
                        'Property' => [
                            'fields' => ['id', 'name'],
                            'order' => ['property_type_id' => 'ASC'],
                            'PropertyType'
                        ]
                    ],
////                    'HouseDate' => [
////                        'TravelDate'
////                    ],
//                    'SpecialOffer' => [
//                        'Portal'
//                    ]
                ],
            );
            $this->request->data = $this->House->find('first', $options);
            debug($this->request->data);die;
            $properties = $this->House->Value->Property->find('all', [
            'fields' => ['Property.id', 'Property.name']
        ]);
            $this->set(compact('properties'));
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
      
        if (!$this->House->exists($id)) {
            throw new NotFoundException(__('Invalid house'));
        }
        if ($this->request->is(array('post', 'put'))) {
//            debug($this->request->data);die;
            if ($this->House->saveAll($this->request->data)) {
                $this->Flash->success(__('The house has been saved.'));
//                return $this->redirect(array('action' => 'edit', $id));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house could not be saved. Please, try again.'));
            }
        } else {
            $options = array(
                'conditions' => array('House.' . $this->House->primaryKey => $id),
                'contain' => [
//                    'User' => ['fields' => ['id', 'username']],
                    'Region' => ['fields' => ['id', 'name']],
                    'District' => ['fields' => ['id', 'name']],
                    'Area',
                    'Value' => [
                        'order' => ['Value.property_id' => 'ASC'],
                        'Property' => [
                            'fields' => ['id', 'name'],
                            'order' => ['property_type_id' => 'ASC'],
                            'PropertyType'
                        ]
                    ],
                    'Room',
                    'Media',
                    'HouseDate' => [
                        'order' => ['travel_date_id' => 'asc'],
                        'TravelDate' => [
                            'conditions' => ['hidden' => false],
                            
                        ],
                        'DateCondition'
                    ],
                    'SpecialOffer' => [
                        'Portal'
                    ]
                ],
            );
            $this->request->data = $this->House->find('first', $options);
        }
//        debug(($this->request->data['HouseDate']));
        $regions = $this->House->Region->find('list');
        $districts = $this->House->District->find('list');
        $areas = $this->House->Area->find('list');
        $dateConditions = $this->House->HouseDate->DateCondition->find('list');
//        $portals = $this->House->Portal->find('list');
//        $travelDates = $this->House->TravelDate->find('list');
//        $values = [];
//        $containValues = [
//            'Property' => [
//                'fields' => ['id', 'name'],
//                'Value' => [
//                    'conditions' => ['Value.house_id' => $id],
//                    'fields' => ['switch', 'value', 'value2']
//                ]
//            ]
//        ];
//        $values['basic'] = $this->House->Value->Property->PropertyType->find('all', [
//            'conditions' => ['PropertyType.id' => [1, 2, 3, 4, 5, 6, 7]],
//            'contain' => $containValues
//        ]);
//        $values['location'] = $this->House->Value->Property->PropertyType->find('all', [
//            'conditions' => ['PropertyType.id' => [8, 9, 10]],
//            'contain' => $containValues
//        ]);
//        $values['equipment'] = $this->House->Value->Property->PropertyType->find('all', [
//            'conditions' => ['PropertyType.id' => [11,12,13,14,15,16,17,18,19,20]],
//            'contain' => $containValues
//        ]);
//        $values['activities'] = $this->House->Value->Property->PropertyType->find('all', [
//            'conditions' => ['PropertyType.id' => [21,22,36]],
//            'contain' => $containValues
//        ]);
//        $values['important'] = $this->House->Value->Property->PropertyType->find('all', [
//            'conditions' => ['PropertyType.id' => [23,24,25,26,27,28,29,30,31,32,33,34,35]],
//            'contain' => $containValues
//        ]);    
//        debug($values);die;
        $this->set(compact('regions', 'districts', 'areas', 'id', 'dateConditions'));
//          $this->render('admin_edit2');
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->House->id = $id;
        if (!$this->House->exists()) {
            throw new NotFoundException(__('Invalid house'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->House->delete()) {
            $this->Flash->success(__('The house has been deleted.'));
        } else {
            $this->Flash->error(__('The house could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
