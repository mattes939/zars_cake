<?php
App::uses('AppController', 'Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class CountriesController extends AppController {

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
		$this->Country->recursive = 0;
		$this->set('countries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		$options = ['conditions' => ['Country.' . $this->Country->primaryKey => $id]];
		$this->set('country', $this->Country->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->save($this->request->data)) {
				$this->Flash->success(__('The country has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The country could not be saved. Please, try again.'));
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
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Country->save($this->request->data)) {
				$this->Flash->success(__('The country has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The country could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Country.' . $this->Country->primaryKey => $id]];
			$this->request->data = $this->Country->find('first', $options);
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Country->delete()) {
			$this->Flash->success(__('The country has been deleted.'));
		} else {
			$this->Flash->error(__('The country could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Country->recursive = 0;
		$this->set('countries', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		$options = ['conditions' => ['Country.' . $this->Country->primaryKey => $id]];
		$this->set('country', $this->Country->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Country->create();
			if ($this->Country->save($this->request->data)) {
				$this->Flash->success(__('The country has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The country could not be saved. Please, try again.'));
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
		if (!$this->Country->exists($id)) {
			throw new NotFoundException(__('Invalid country'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Country->save($this->request->data)) {
				$this->Flash->success(__('The country has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The country could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Country.' . $this->Country->primaryKey => $id]];
			$this->request->data = $this->Country->find('first', $options);
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
		$this->Country->id = $id;
		if (!$this->Country->exists()) {
			throw new NotFoundException(__('Invalid country'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Country->delete()) {
			$this->Flash->success(__('The country has been deleted.'));
		} else {
			$this->Flash->error(__('The country could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
