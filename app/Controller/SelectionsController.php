<?php
App::uses('AppController', 'Controller');
/**
 * Selections Controller
 *
 * @property Selection $Selection
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SelectionsController extends AppController {

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
		$this->Selection->recursive = 0;
		$this->set('selections', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$options = ['conditions' => ['Selection.' . $this->Selection->primaryKey => $id]];
		$this->set('selection', $this->Selection->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Selection->create();
			if ($this->Selection->save($this->request->data)) {
				$this->Flash->success(__('The selection has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The selection could not be saved. Please, try again.'));
			}
		}
		$areas = $this->Selection->Area->find('list');
		$properties = $this->Selection->Property->find('list');
		$this->set(compact('areas', 'properties'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Selection->save($this->request->data)) {
				$this->Flash->success(__('The selection has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The selection could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Selection.' . $this->Selection->primaryKey => $id]];
			$this->request->data = $this->Selection->find('first', $options);
		}
		$areas = $this->Selection->Area->find('list');
		$properties = $this->Selection->Property->find('list');
		$this->set(compact('areas', 'properties'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Selection->id = $id;
		if (!$this->Selection->exists()) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Selection->delete()) {
			$this->Flash->success(__('The selection has been deleted.'));
		} else {
			$this->Flash->error(__('The selection could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Selection->recursive = 0;
		$this->set('selections', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$options = ['conditions' => ['Selection.' . $this->Selection->primaryKey => $id]];
		$this->set('selection', $this->Selection->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Selection->create();
			if ($this->Selection->save($this->request->data)) {
				$this->Flash->success(__('The selection has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The selection could not be saved. Please, try again.'));
			}
		}
		$areas = $this->Selection->Area->find('list');
		$properties = $this->Selection->Property->find('list');
		$this->set(compact('areas', 'properties'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Selection->exists($id)) {
			throw new NotFoundException(__('Invalid selection'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Selection->save($this->request->data)) {
				$this->Flash->success(__('The selection has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The selection could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Selection.' . $this->Selection->primaryKey => $id]];
			$this->request->data = $this->Selection->find('first', $options);
		}
		$areas = $this->Selection->Area->find('list');
		$properties = $this->Selection->Property->find('list');
		$this->set(compact('areas', 'properties'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Selection->id = $id;
		if (!$this->Selection->exists()) {
			throw new NotFoundException(__('Invalid selection'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Selection->delete()) {
			$this->Flash->success(__('The selection has been deleted.'));
		} else {
			$this->Flash->error(__('The selection could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
