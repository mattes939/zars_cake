<?php
App::uses('AppController', 'Controller');
/**
 * Addresses Controller
 *
 * @property Address $Address
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AddressesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = ['Paginator', 'Session', 'Flash'];

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = ['conditions' => ['Address.' . $this->Address->primaryKey => $id]];
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}
		}
		$addressTypes = $this->Address->AddressType->find('list');
		$users = $this->Address->User->find('list');
		$houses = $this->Address->House->find('list');
		$countries = $this->Address->Country->find('list');
		$this->set(compact('addressTypes', 'users', 'houses', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Address->save($this->request->data)) {
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Address.' . $this->Address->primaryKey => $id]];
			$this->request->data = $this->Address->find('first', $options);
		}
		$addressTypes = $this->Address->AddressType->find('list');
		$users = $this->Address->User->find('list');
		$houses = $this->Address->House->find('list');
		$countries = $this->Address->Country->find('list');
		$this->set(compact('addressTypes', 'users', 'houses', 'countries'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Address->delete()) {
			$this->Flash->success(__('The address has been deleted.'));
		} else {
			$this->Flash->error(__('The address could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Address->recursive = 0;
		$this->set('addresses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		$options = ['conditions' => ['Address.' . $this->Address->primaryKey => $id]];
		$this->set('address', $this->Address->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Address->create();
			if ($this->Address->save($this->request->data)) {
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}
		}
		$addressTypes = $this->Address->AddressType->find('list');
		$users = $this->Address->User->find('list');
		$houses = $this->Address->House->find('list');
		$countries = $this->Address->Country->find('list');
		$this->set(compact('addressTypes', 'users', 'houses', 'countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Address->exists($id)) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Address->save($this->request->data)) {
				$this->Flash->success(__('The address has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Address.' . $this->Address->primaryKey => $id]];
			$this->request->data = $this->Address->find('first', $options);
		}
		$addressTypes = $this->Address->AddressType->find('list');
		$users = $this->Address->User->find('list');
		$houses = $this->Address->House->find('list');
		$countries = $this->Address->Country->find('list');
		$this->set(compact('addressTypes', 'users', 'houses', 'countries'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Address->delete()) {
			$this->Flash->success(__('The address has been deleted.'));
		} else {
			$this->Flash->error(__('The address could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
