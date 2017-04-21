<?php
App::uses('AppController', 'Controller');
/**
 * PropertyTypes Controller
 *
 * @property PropertyType $PropertyType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PropertyTypesController extends AppController {

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
		$this->PropertyType->recursive = 0;
		$this->set('propertyTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PropertyType->exists($id)) {
			throw new NotFoundException(__('Invalid property type'));
		}
		$options = array('conditions' => array('PropertyType.' . $this->PropertyType->primaryKey => $id));
		$this->set('propertyType', $this->PropertyType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PropertyType->create();
			if ($this->PropertyType->save($this->request->data)) {
				$this->Flash->success(__('The property type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The property type could not be saved. Please, try again.'));
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
		if (!$this->PropertyType->exists($id)) {
			throw new NotFoundException(__('Invalid property type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PropertyType->save($this->request->data)) {
				$this->Flash->success(__('The property type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The property type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PropertyType.' . $this->PropertyType->primaryKey => $id));
			$this->request->data = $this->PropertyType->find('first', $options);
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
		$this->PropertyType->id = $id;
		if (!$this->PropertyType->exists()) {
			throw new NotFoundException(__('Invalid property type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PropertyType->delete()) {
			$this->Flash->success(__('The property type has been deleted.'));
		} else {
			$this->Flash->error(__('The property type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PropertyType->recursive = 0;
		$this->set('propertyTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PropertyType->exists($id)) {
			throw new NotFoundException(__('Invalid property type'));
		}
		$options = array('conditions' => array('PropertyType.' . $this->PropertyType->primaryKey => $id));
		$this->set('propertyType', $this->PropertyType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PropertyType->create();
			if ($this->PropertyType->save($this->request->data)) {
				$this->Flash->success(__('The property type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The property type could not be saved. Please, try again.'));
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
		if (!$this->PropertyType->exists($id)) {
			throw new NotFoundException(__('Invalid property type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PropertyType->save($this->request->data)) {
				$this->Flash->success(__('The property type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The property type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PropertyType.' . $this->PropertyType->primaryKey => $id));
			$this->request->data = $this->PropertyType->find('first', $options);
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
		$this->PropertyType->id = $id;
		if (!$this->PropertyType->exists()) {
			throw new NotFoundException(__('Invalid property type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PropertyType->delete()) {
			$this->Flash->success(__('The property type has been deleted.'));
		} else {
			$this->Flash->error(__('The property type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
