<?php
App::uses('AppController', 'Controller');
/**
 * Properties Controller
 *
 * @property Property $Property
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PropertiesController extends AppController {

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
		$this->Property->recursive = 0;
		$this->set('properties', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		$options = ['conditions' => ['Property.' . $this->Property->primaryKey => $id]];
		$this->set('property', $this->Property->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Property->create();
			if ($this->Property->save($this->request->data)) {
				$this->Flash->success(__('The property has been saved.'));
				return $this->redirect(['action' => 'add']);
			} else {
				$this->Flash->error(__('The property could not be saved. Please, try again.'));
			}
		}
		$propertyTypes = $this->Property->PropertyType->find('list');
		$this->set(compact('propertyTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Property->save($this->request->data)) {
				$this->Flash->success(__('The property has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The property could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Property.' . $this->Property->primaryKey => $id]];
			$this->request->data = $this->Property->find('first', $options);
		}
		$propertyTypes = $this->Property->PropertyType->find('list');
		$this->set(compact('propertyTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Property->delete()) {
			$this->Flash->success(__('The property has been deleted.'));
		} else {
			$this->Flash->error(__('The property could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Property->recursive = 0;
		$this->set('properties', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		$options = ['conditions' => ['Property.' . $this->Property->primaryKey => $id]];
		$this->set('property', $this->Property->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Property->create();
			if ($this->Property->save($this->request->data)) {
				$this->Flash->success(__('The property has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The property could not be saved. Please, try again.'));
			}
		}
		$propertyTypes = $this->Property->PropertyType->find('list');
		$this->set(compact('propertyTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Property->exists($id)) {
			throw new NotFoundException(__('Invalid property'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Property->save($this->request->data)) {
				$this->Flash->success(__('The property has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The property could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Property.' . $this->Property->primaryKey => $id]];
			$this->request->data = $this->Property->find('first', $options);
		}
		$propertyTypes = $this->Property->PropertyType->find('list');
		$this->set(compact('propertyTypes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Property->id = $id;
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid property'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Property->delete()) {
			$this->Flash->success(__('The property has been deleted.'));
		} else {
			$this->Flash->error(__('The property could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
