<?php

App::uses('AppController', 'Controller');

/**
 * Prices Controller
 *
 * @property Price $Price
 * @property PaginatorComponent $Paginator
 */
class PricesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator', 'Session', 'Flash'];

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Price->recursive = 0;
        $this->set('prices', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Price->exists($id)) {
            throw new NotFoundException(__('Invalid price'));
        }
        $options = array('conditions' => array('Price.' . $this->Price->primaryKey => $id));
        $this->set('price', $this->Price->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($houseId = null, $priceListId = 1) {
        if ($this->request->is('post')) {
            foreach ($this->request->data['Price'] as $i => $price) {
                $this->request->data['Price'][$i]['house_id'] = $houseId;
            }
//            debug($this->request->data);die;
//            $this->Price->create();
            if ($this->Price->saveMany($this->request->data['Price'])) {
                $this->Flash->success(__('The price has been saved.'));
                return $this->redirect(array('controller' => 'houses', 'action' => 'edit', $houseId));
            } else {
                $this->Flash->error(__('The price could not be saved. Please, try again.'));
            }
        }
        $house = $this->Price->House->find('first', [
            'conditions' => [
                'id' => $houseId
            ],
        ]);
        $travelDateTypes = $this->Price->TravelDateType->find('list');
//                debug($travelDateTypes);
        $this->set(compact('house', 'travelDateTypes', 'priceListId'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $houseId
     * @return void
     */
    public function admin_edit($houseId = null) {
        if (!$this->Price->House->exists($houseId)) {
            throw new NotFoundException(__('Invalid price'));
        }
        if ($this->request->is(array('post', 'put'))) {
//            debug($this->request->data);die;
            if ($this->Price->saveMany($this->request->data['Price'])) {
                $this->Flash->success(__('The price has been saved.'));
                return $this->redirect(array('controller' => 'prices', 'action' => 'edit', $houseId));
            } else {
                $this->Flash->error(__('The price could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Price.house_id' => $houseId));
            $prices = $this->Price->find('all', $options);
            if(empty($prices)){
                return $this->redirect(['controller' => 'prices', 'action' => 'add', $houseId]);
            }
            $this->request->data = $prices;
        }
        $house = $this->Price->House->find('first', [
            'conditions' => [
                'id' => $houseId
            ],
            'contain' => [
                'Pricelist'
            ]
        ]);
        $travelDateTypes = $this->Price->TravelDateType->find('list');
        $this->set(compact('house', 'travelDateTypes'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Price->id = $id;
        if (!$this->Price->exists()) {
            throw new NotFoundException(__('Invalid price'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Price->delete()) {
            $this->Flash->success(__('The price has been deleted.'));
        } else {
            $this->Flash->error(__('The price could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
