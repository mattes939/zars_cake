<?php
App::uses('AppController', 'Controller');
/**
 * AddressTypes Controller
 *
 * @property AddressType $AddressType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AddressTypesController extends AppController {

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
		$this->AddressType->recursive = 0;
		$this->set('addressTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AddressType->exists($id)) {
			throw new NotFoundException(__('Invalid address type'));
		}
		$options = ['conditions' => ['AddressType.' . $this->AddressType->primaryKey => $id]];
		$this->set('addressType', $this->AddressType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AddressType->create();
			if ($this->AddressType->save($this->request->data)) {
				$this->Flash->success(__('The address type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AddressType->exists($id)) {
			throw new NotFoundException(__('Invalid address type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->AddressType->save($this->request->data)) {
				$this->Flash->success(__('The address type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['AddressType.' . $this->AddressType->primaryKey => $id]];
			$this->request->data = $this->AddressType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AddressType->id = $id;
		if (!$this->AddressType->exists()) {
			throw new NotFoundException(__('Invalid address type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AddressType->delete()) {
			$this->Flash->success(__('The address type has been deleted.'));
		} else {
			$this->Flash->error(__('The address type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AddressType->recursive = 0;
		$this->set('addressTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AddressType->exists($id)) {
			throw new NotFoundException(__('Invalid address type'));
		}
		$options = ['conditions' => ['AddressType.' . $this->AddressType->primaryKey => $id]];
		$this->set('addressType', $this->AddressType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AddressType->create();
			if ($this->AddressType->save($this->request->data)) {
				$this->Flash->success(__('The address type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address type could not be saved. Please, try again.'));
			}
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
		if (!$this->AddressType->exists($id)) {
			throw new NotFoundException(__('Invalid address type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->AddressType->save($this->request->data)) {
				$this->Flash->success(__('The address type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The address type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['AddressType.' . $this->AddressType->primaryKey => $id]];
			$this->request->data = $this->AddressType->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AddressType->id = $id;
		if (!$this->AddressType->exists()) {
			throw new NotFoundException(__('Invalid address type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AddressType->delete()) {
			$this->Flash->success(__('The address type has been deleted.'));
		} else {
			$this->Flash->error(__('The address type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
