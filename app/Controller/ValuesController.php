<?php

App::uses('AppController', 'Controller');

/**
 * Values Controller
 *
 * @property Value $Value
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ValuesController extends AppController {

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
    public function index() {
//        ini_set('memory_limit', '-1');
//        ini_set('max_execution_time', 0);
//        
//        foreach ($this->Value->informace as $informace) {
//            if ($this->Value->House->exists($informace['cid'])) {
////                debug($informace);
////                        break;
//                 $update = ['Value.value' => '"'.$informace[53].'"', 'Value.value2' => '"'.$informace[54].'"'];
//                 $update2 = ['Value.value' => '"'.$informace[55].'"', 'Value.value2' => '"'.$informace[56].'"'];
//                 
////                for($i = 53; $i<=56;$i++){
////                    if(empty($informace[$i])){
////                        unset($update[array_search($informace[$i], $update2)]);
////                        unset($update[array_search($informace[$i], $update)]);
////                    }
////                }
//                
//               
//                $conditions = ['Value.house_id' => $informace['cid'], 'Value.property_id' => 306];
//                
//                $conditions2 = ['Value.house_id' => $informace['cid'], 'Value.property_id' => 307];
//                $this->Value->unbindModel(['belongsTo' => ['House', 'Property']], true);
//                $this->Value->updateAll(array_filter($update), $conditions);
//                $this->Value->unbindModel(['belongsTo' => ['House', 'Property']], true);
//                $this->Value->updateAll(array_filter($update2), $conditions2);
//            }
////           if(in_array($i, []))
//        }
////        debug($this->Value->saveMany($values));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Value->exists($id)) {
            throw new NotFoundException(__('Invalid value'));
        }
        $options = array('conditions' => array('Value.' . $this->Value->primaryKey => $id));
        $this->set('value', $this->Value->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Value->create();
            if ($this->Value->save($this->request->data)) {
                $this->Flash->success(__('The value has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The value could not be saved. Please, try again.'));
            }
        }
        $houses = $this->Value->House->find('list');
        $properties = $this->Value->Property->find('list');
        $this->set(compact('houses', 'properties'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Value->exists($id)) {
            throw new NotFoundException(__('Invalid value'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Value->save($this->request->data)) {
                $this->Flash->success(__('The value has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The value could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Value.' . $this->Value->primaryKey => $id));
            $this->request->data = $this->Value->find('first', $options);
        }
        $houses = $this->Value->House->find('list');
        $properties = $this->Value->Property->find('list');
        $this->set(compact('houses', 'properties'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Value->id = $id;
        if (!$this->Value->exists()) {
            throw new NotFoundException(__('Invalid value'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Value->delete()) {
            $this->Flash->success(__('The value has been deleted.'));
        } else {
            $this->Flash->error(__('The value could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Value->recursive = 0;
        $this->set('values', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Value->exists($id)) {
            throw new NotFoundException(__('Invalid value'));
        }
        $options = array('conditions' => array('Value.' . $this->Value->primaryKey => $id));
        $this->set('value', $this->Value->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Value->create();
            if ($this->Value->save($this->request->data)) {
                $this->Flash->success(__('The value has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The value could not be saved. Please, try again.'));
            }
        }
        $houses = $this->Value->House->find('list');
        $properties = $this->Value->Property->find('list');
        $this->set(compact('houses', 'properties'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($house_id = null, $valueGroup = null) {
        if (!$this->Value->House->exists($house_id)) {
            throw new NotFoundException(__('Invalid value'));
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Value->Property->saveAll($this->request->data)) {
                $this->Flash->success(__('The value has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The value could not be saved. Please, try again.'));
            }
        } else {
            switch ($valueGroup) {
                case 1:
                    $propertyTypeId = [1, 2, 3, 4, 5, 6, 7];
                    break;
                case 2:
                    $propertyTypeId = [8, 9, 10];
                    break;
                case 3:
                    $propertyTypeId = [11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
                    break;
                case 4:
                    $propertyTypeId = [21, 22, 36];
                    break;
                case 5:
                    $propertyTypeId = [23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35];
                    break;
                default :
                    $propertyTypeId = [];
                    break;
            }
            $options = array(
                'conditions' => ['Property.property_type_id' => $propertyTypeId],
                'contain' => [
                    'PropertyType',
                    'Value' => [
                        'conditions' => [
                            'Value.house_id' => $house_id
                        ],
//                        'House'
                    ]
                ]
            );
            $this->request->data = $this->Value->Property->find('all', $options);
//            debug($this->request->data);
        }
        $houses = $this->Value->House->find('list');
        $properties = $this->Value->Property->find('list');
       
        $this->set(compact('houses', 'properties'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Value->id = $id;
        if (!$this->Value->exists()) {
            throw new NotFoundException(__('Invalid value'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Value->delete()) {
            $this->Flash->success(__('The value has been deleted.'));
        } else {
            $this->Flash->error(__('The value could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
