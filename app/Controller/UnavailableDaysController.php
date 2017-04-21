<?php
App::uses('AppController', 'Controller');
/**
 * UnavailableDays Controller
 *
 * @property UnavailableDay $UnavailableDay
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UnavailableDaysController extends AppController {

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
		$this->UnavailableDay->recursive = 0;
		$this->set('unavailableDays', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UnavailableDay->exists($id)) {
			throw new NotFoundException(__('Invalid unavailable day'));
		}
		$options = array('conditions' => array('UnavailableDay.' . $this->UnavailableDay->primaryKey => $id));
		$this->set('unavailableDay', $this->UnavailableDay->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UnavailableDay->create();
			if ($this->UnavailableDay->save($this->request->data)) {
				$this->Flash->success(__('The unavailable day has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The unavailable day could not be saved. Please, try again.'));
			}
		}
		$houseDates = $this->UnavailableDay->HouseDate->find('list');
		$this->set(compact('houseDates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UnavailableDay->exists($id)) {
			throw new NotFoundException(__('Invalid unavailable day'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnavailableDay->save($this->request->data)) {
				$this->Flash->success(__('The unavailable day has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The unavailable day could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UnavailableDay.' . $this->UnavailableDay->primaryKey => $id));
			$this->request->data = $this->UnavailableDay->find('first', $options);
		}
		$houseDates = $this->UnavailableDay->HouseDate->find('list');
		$this->set(compact('houseDates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UnavailableDay->id = $id;
		if (!$this->UnavailableDay->exists()) {
			throw new NotFoundException(__('Invalid unavailable day'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UnavailableDay->delete()) {
			$this->Flash->success(__('The unavailable day has been deleted.'));
		} else {
			$this->Flash->error(__('The unavailable day could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UnavailableDay->recursive = 0;
		$this->set('unavailableDays', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UnavailableDay->exists($id)) {
			throw new NotFoundException(__('Invalid unavailable day'));
		}
		$options = array('conditions' => array('UnavailableDay.' . $this->UnavailableDay->primaryKey => $id));
		$this->set('unavailableDay', $this->UnavailableDay->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UnavailableDay->create();
			if ($this->UnavailableDay->save($this->request->data)) {
				$this->Flash->success(__('The unavailable day has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The unavailable day could not be saved. Please, try again.'));
			}
		}
		$houseDates = $this->UnavailableDay->HouseDate->find('list');
		$this->set(compact('houseDates'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UnavailableDay->exists($id)) {
			throw new NotFoundException(__('Invalid unavailable day'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UnavailableDay->save($this->request->data)) {
				$this->Flash->success(__('The unavailable day has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The unavailable day could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UnavailableDay.' . $this->UnavailableDay->primaryKey => $id));
			$this->request->data = $this->UnavailableDay->find('first', $options);
		}
		$houseDates = $this->UnavailableDay->HouseDate->find('list');
		$this->set(compact('houseDates'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UnavailableDay->id = $id;
		if (!$this->UnavailableDay->exists()) {
			throw new NotFoundException(__('Invalid unavailable day'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UnavailableDay->delete()) {
			$this->Flash->success(__('The unavailable day has been deleted.'));
		} else {
			$this->Flash->error(__('The unavailable day could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
