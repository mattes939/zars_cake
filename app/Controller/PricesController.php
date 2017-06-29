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
	public $components = array('Paginator');

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
	public function admin_add($houseId = null) {
		if ($this->request->is('post')) {
			$this->Price->create();
			if ($this->Price->save($this->request->data)) {
				$this->Flash->success(__('The price has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The price could not be saved. Please, try again.'));
			}
		}
		$houses = $this->Price->House->find('list');
		$travelDateTypes = $this->Price->TravelDateType->find('list');
//                debug($travelDateTypes);
		$this->set(compact('houses', 'travelDateTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($houseId = null) {
		if (!$this->Price->House->exists($houseId)) {
			throw new NotFoundException(__('Invalid price'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Price->save($this->request->data)) {
				$this->Flash->success(__('The price has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The price could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Price.' . $this->Price->primaryKey => $id));
			$this->request->data = $this->Price->find('first', $options);
		}
		$houses = $this->Price->House->find('list');
		$travelDateTypes = $this->Price->TravelDateType->find('list');
		$this->set(compact('houses', 'travelDateTypes'));
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
