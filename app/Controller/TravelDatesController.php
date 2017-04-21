<?php
App::uses('AppController', 'Controller');
/**
 * TravelDates Controller
 *
 * @property TravelDate $TravelDate
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TravelDatesController extends AppController {

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
		$this->TravelDate->recursive = 0;
		$this->set('travelDates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TravelDate->exists($id)) {
			throw new NotFoundException(__('Invalid travel date'));
		}
		$options = array('conditions' => array('TravelDate.' . $this->TravelDate->primaryKey => $id));
		$this->set('travelDate', $this->TravelDate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TravelDate->create();
			if ($this->TravelDate->save($this->request->data)) {
				$this->Flash->success(__('The travel date has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The travel date could not be saved. Please, try again.'));
			}
		}
		$houses = $this->TravelDate->House->find('list');
		$this->set(compact('houses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TravelDate->exists($id)) {
			throw new NotFoundException(__('Invalid travel date'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TravelDate->save($this->request->data)) {
				$this->Flash->success(__('The travel date has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The travel date could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TravelDate.' . $this->TravelDate->primaryKey => $id));
			$this->request->data = $this->TravelDate->find('first', $options);
		}
		$houses = $this->TravelDate->House->find('list');
		$this->set(compact('houses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TravelDate->id = $id;
		if (!$this->TravelDate->exists()) {
			throw new NotFoundException(__('Invalid travel date'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TravelDate->delete()) {
			$this->Flash->success(__('The travel date has been deleted.'));
		} else {
			$this->Flash->error(__('The travel date could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TravelDate->recursive = 0;
		$this->set('travelDates', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TravelDate->exists($id)) {
			throw new NotFoundException(__('Invalid travel date'));
		}
		$options = array('conditions' => array('TravelDate.' . $this->TravelDate->primaryKey => $id));
		$this->set('travelDate', $this->TravelDate->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TravelDate->create();
			if ($this->TravelDate->save($this->request->data)) {
				$this->Flash->success(__('The travel date has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The travel date could not be saved. Please, try again.'));
			}
		}
		$houses = $this->TravelDate->House->find('list');
		$this->set(compact('houses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($house_id = null) {
		if (!$this->TravelDate->exists($house_id)) {
			throw new NotFoundException(__('Invalid travel date'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TravelDate->save($this->request->data)) {
				$this->Flash->success(__('The travel date has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The travel date could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TravelDate.' . $this->TravelDate->primaryKey => $id));
			$this->request->data = $this->TravelDate->find('first', $options);
		}
		$houses = $this->TravelDate->House->find('list');
		$this->set(compact('houses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->TravelDate->id = $id;
		if (!$this->TravelDate->exists()) {
			throw new NotFoundException(__('Invalid travel date'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TravelDate->delete()) {
			$this->Flash->success(__('The travel date has been deleted.'));
		} else {
			$this->Flash->error(__('The travel date could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
