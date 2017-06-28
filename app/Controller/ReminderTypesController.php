<?php
App::uses('AppController', 'Controller');
/**
 * ReminderTypes Controller
 *
 * @property ReminderType $ReminderType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ReminderTypesController extends AppController {

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
		$this->ReminderType->recursive = 0;
		$this->set('reminderTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReminderType->exists($id)) {
			throw new NotFoundException(__('Invalid reminder type'));
		}
		$options = ['conditions' => ['ReminderType.' . $this->ReminderType->primaryKey => $id]];
		$this->set('reminderType', $this->ReminderType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReminderType->create();
			if ($this->ReminderType->save($this->request->data)) {
				$this->Flash->success(__('The reminder type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The reminder type could not be saved. Please, try again.'));
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
		if (!$this->ReminderType->exists($id)) {
			throw new NotFoundException(__('Invalid reminder type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->ReminderType->save($this->request->data)) {
				$this->Flash->success(__('The reminder type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The reminder type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['ReminderType.' . $this->ReminderType->primaryKey => $id]];
			$this->request->data = $this->ReminderType->find('first', $options);
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
		$this->ReminderType->id = $id;
		if (!$this->ReminderType->exists()) {
			throw new NotFoundException(__('Invalid reminder type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ReminderType->delete()) {
			$this->Flash->success(__('The reminder type has been deleted.'));
		} else {
			$this->Flash->error(__('The reminder type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ReminderType->recursive = 0;
		$this->set('reminderTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ReminderType->exists($id)) {
			throw new NotFoundException(__('Invalid reminder type'));
		}
		$options = ['conditions' => ['ReminderType.' . $this->ReminderType->primaryKey => $id]];
		$this->set('reminderType', $this->ReminderType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ReminderType->create();
			if ($this->ReminderType->save($this->request->data)) {
				$this->Flash->success(__('The reminder type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The reminder type could not be saved. Please, try again.'));
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
		if (!$this->ReminderType->exists($id)) {
			throw new NotFoundException(__('Invalid reminder type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->ReminderType->save($this->request->data)) {
				$this->Flash->success(__('The reminder type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The reminder type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['ReminderType.' . $this->ReminderType->primaryKey => $id]];
			$this->request->data = $this->ReminderType->find('first', $options);
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
		$this->ReminderType->id = $id;
		if (!$this->ReminderType->exists()) {
			throw new NotFoundException(__('Invalid reminder type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ReminderType->delete()) {
			$this->Flash->success(__('The reminder type has been deleted.'));
		} else {
			$this->Flash->error(__('The reminder type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
