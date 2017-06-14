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
    public $helpers = ['Media.Media', 'Code'];

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
        $houses = $this->House->find('all', [
            'conditions' => [
                'active' => 1,
                'hot' => 1
            ],
            'fields' => ['name', 'created', 'code', 'slug'],
            'contain' => [
                'Area' => [
                    'fields' => ['name']
                ],
                'Media' => [
                    'fields' => ['file'],
                    'order' => ['lft' => 'ASC'],
                    'limit' => 1
                ],
                'Room' => [
                    'conditions' => [
                        'NOT' => ['total_beds' => null]
                    ],
                    'fields' => 'total_beds',
                ]
            ]
        ]);

        $travelDates = $this->House->HouseDate->TravelDate->travelDatesList();
        $areas = $this->House->Area->find('list', [
            'order' => ['name' => 'asc'],
//            'conditions' => ['country_id' => 1]
            'fields' => ['id', 'name', 'country_id']
        ]);
        $countries = $this->House->Address->Country->find('list');
//debug($areas);

        $this->set(compact('houses', 'travelDates', 'countries', 'areas'));
//        $wifi = $this->House->Value->find('list', [
//            'conditions' => [
//                'property_id' => 142,
//                'switch' => true
//            ],
//            'fields' => ['id', 'house_id']
//        ]);
//        $new = $this->House->Value->find('list', [
//            'conditions' => [
//                'property_id' => 77,
//                'switch' => true
//            ],
//            'fields' => ['id', 'house_id']
//        ]);
//        $intersect = array_intersect($wifi, $new);
////        debug($intersect);
//        $houses = $this->House->find('all', [
//            'conditions' => ['id' => $intersect],
//            'fields' => ['id', 'name']
//        ]);
//        debug($houses);
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

    public function search() {
//        $this->convertGetQueryString2named($this->request->query);
//        debug($this->request->query);


        $houses = $this->House->search($this->request->query['country'], $this->request->query['area'], $this->request->query['travelDate'], $this->request->query['persons'], $this->request->query['bedrooms']);
        $travelDates = $this->House->HouseDate->TravelDate->travelDatesList();
        $areas = $this->House->Area->find('list', [
            'order' => ['name' => 'asc'],
            'conditions' => ['country_id' => 1]
        ]);
        $countries = $this->House->Address->Country->find('list');


        $this->set(compact('houses', 'travelDates', 'countries', 'areas'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
//    public function view($area = null, $region = NULL, $district = NULL, $slug = NULL) {
    public function view($slug = NULL, $print = null) {
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
//                'Value' => [
//                    'order' => ['Value.property_id' => 'ASC'],
//                    'Property' => [
//                        'fields' => ['id', 'name'],
//                        'order' => ['property_type_id' => 'ASC'],
//                        'PropertyType' => [
//                            'fields' => ['id', 'name'],
//                        ]
//                    ]
//                ],
                'Room',
                'Media' => [
                    'fields' => ['id', 'file']
                ],
                'Thumb',
//                'HouseDate' => [
//                    'order' => ['travel_date_id' => 'asc'],
//                    'TravelDate' => [
//                        'conditions' => ['hidden' => false],
//                    ],
//                    'DateCondition'
//                ],
//                    'SpecialOffer' => [
//                        'Portal'
//                    ]
            ],
        );
        $house = $this->House->find('first', $options);
//debug($house['Thumb']);
//        $properties = $this->House->Value->Property->find('all', [
//            'fields' => ['name', 'property_type_id'],
//            'order' => ['Property_type_id' => 'ASC'],
//            'contain' =>[
//                'PropertyType' => [
//                  'fields' => ['name']  
//                ],
//                'Value' => [
//                    'conditions' => ['house_id' => $house['House']['id']],
//                    'fields' => ['switch', 'value', 'value2']
//                ]
//            ]
//        ]);
        $properties = $this->House->Value->Property->PropertyType->find('all', [
            'fields' => ['name'],
            'order' => ['id' => 'ASC'],
            'contain' => [
                'Property' => [
                    'fields' => ['name'],
                    'Value' => [
                        'conditions' => ['house_id' => $house['House']['id']],
                        'fields' => ['switch', 'value', 'value2']
                    ]
                ],
            ]
        ]);
//        $propertyCategories = Hash::sort($properties, '{n}.Property.property_type_id', 'asc');
//        debug($properties);


        $travelDates = $this->House->HouseDate->TravelDate->find('all', [
            'conditions' => ['hidden' => false, 'start >= CURDATE()'],
            'order' => ['start' => 'ASC'],
            'fields' => ['start', 'end', 'travel_date_type_id'],
            'contain' => [
                'HouseDate' => [
                    'conditions' => ['house_id' => $house['House']['id']],
                    'fields' => ['date_condition_id', 'id'],
                    'limit' => 1,
                    'DateCondition'
                ],
                'TravelDateType' => [
                    'fields' => ['name']
                ]
            ]
        ]);
        if ($house['House']['composition']) {
            $children = Hash::extract($this->House->children($house['House']['id'], true, ['id']), '{n}.House.id');
            $childrenTravelDates = $this->House->HouseDate->TravelDate->composition($children);

            $beds = $this->House->Room->find('all', [
                'conditions' => ['house_id' => $children],
                'fields' => ['SUM(total_beds)', 'SUM(extra_beds)'],
                'group' => ['house_id'],
            ]);
            $totalBeds = ['SUM(total_beds)' => 0, 'SUM(extra_beds)' => 0];
            foreach ($beds as $value) {
                $totalBeds['SUM(total_beds)'] += $value[0]['SUM(total_beds)'];
                $totalBeds['SUM(extra_beds)'] += $value[0]['SUM(extra_beds)'];
            }

            $this->set(compact('childrenTravelDates'));
            $this->set('beds', $totalBeds);
            if(count($travelDates) != count($childrenTravelDates)){
                throw new ErrorException('Špatně zadané termíny!');
            }
        } else {

            $beds = $this->House->Room->find('all', [
                'conditions' => ['house_id' => $house['House']['id']],
                'fields' => ['SUM(total_beds)', 'SUM(extra_beds)'],
                'group' => ['house_id'],
            ]);
            $this->set('beds', $beds[0][0]);
        }

//        $this->House->HouseDate->generate($house['House']['id']);
//            debug($travelDates);


        $this->set(compact('house', 'travelDates', 'properties'));



        if ($print == 'tisk') {
            $this->render('print', 'print');
        }
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

    public function admin_attributes($id) {
        ini_set('max_input_vars', 2000);
        ini_set('suhosin.post.max_vars', 2000);
        ini_set('suhosin.request.max_vars', 2000);
//        phpinfo();
        if ($this->request->is(array('post', 'put'))) {
//             debug($_POST);
            debug($this->request->data);
            die;
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
            debug($this->request->data);
            die;
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
        $parents = $this->House->generateTreeList([
            'parent_id' => null
        ]);
//        debug($parentHouses);
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
        $this->set(compact('regions', 'districts', 'areas', 'id', 'dateConditions', 'parents'));
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

    protected function convertGetQueryString2named($param_names = null) {
//            debug($param_names);
        $parameters_strings = array();
        if (is_array($param_names)) {
            foreach ($param_names as $i => $param_name) {
//                debug($param_name);
                if (!empty($this->request->query[$i])) {
                    $parameters_strings[$i] = $this->request->query[$i];
                }
//                debug($parameters_strings);
            }
        } else {
            $parameters_strings = $this->request->query;
            unset($parameters_strings['url']);
        }
//        debug($parameters_strings);die;
        if (!empty($parameters_strings)) {

            $parameters_strings = array_merge($this->request->params['named'], $parameters_strings);
            $this->redirect($parameters_strings, null, true);
        }
    }

}
