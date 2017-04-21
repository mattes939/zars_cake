<?php
App::uses('AppController', 'Controller');
/**
 * DateConditions Controller
 *
 * @property DateCondition $DateCondition
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DateConditionsController extends AppController {

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
		$this->DateCondition->recursive = 0;
		$this->set('dateConditions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DateCondition->exists($id)) {
			throw new NotFoundException(__('Invalid date condition'));
		}
		$options = array('conditions' => array('DateCondition.' . $this->DateCondition->primaryKey => $id));
		$this->set('dateCondition', $this->DateCondition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DateCondition->create();
			if ($this->DateCondition->save($this->request->data)) {
				$this->Flash->success(__('The date condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The date condition could not be saved. Please, try again.'));
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
		if (!$this->DateCondition->exists($id)) {
			throw new NotFoundException(__('Invalid date condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DateCondition->save($this->request->data)) {
				$this->Flash->success(__('The date condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The date condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DateCondition.' . $this->DateCondition->primaryKey => $id));
			$this->request->data = $this->DateCondition->find('first', $options);
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
		$this->DateCondition->id = $id;
		if (!$this->DateCondition->exists()) {
			throw new NotFoundException(__('Invalid date condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DateCondition->delete()) {
			$this->Flash->success(__('The date condition has been deleted.'));
		} else {
			$this->Flash->error(__('The date condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DateCondition->recursive = 0;
		$this->set('dateConditions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DateCondition->exists($id)) {
			throw new NotFoundException(__('Invalid date condition'));
		}
		$options = array('conditions' => array('DateCondition.' . $this->DateCondition->primaryKey => $id));
		$this->set('dateCondition', $this->DateCondition->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DateCondition->create();
			if ($this->DateCondition->save($this->request->data)) {
				$this->Flash->success(__('The date condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The date condition could not be saved. Please, try again.'));
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
		if (!$this->DateCondition->exists($id)) {
			throw new NotFoundException(__('Invalid date condition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DateCondition->save($this->request->data)) {
				$this->Flash->success(__('The date condition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The date condition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DateCondition.' . $this->DateCondition->primaryKey => $id));
			$this->request->data = $this->DateCondition->find('first', $options);
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
		$this->DateCondition->id = $id;
		if (!$this->DateCondition->exists()) {
			throw new NotFoundException(__('Invalid date condition'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DateCondition->delete()) {
			$this->Flash->success(__('The date condition has been deleted.'));
		} else {
			$this->Flash->error(__('The date condition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
