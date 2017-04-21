<?php
App::uses('AppController', 'Controller');
/**
 * Reminders Controller
 *
 * @property Reminder $Reminder
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RemindersController extends AppController {

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
		$this->Reminder->recursive = 0;
		$this->set('reminders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
		$this->set('reminder', $this->Reminder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reminder->create();
			if ($this->Reminder->save($this->request->data)) {
				$this->Flash->success(__('The reminder has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reminder could not be saved. Please, try again.'));
			}
		}
		$reminderTypes = $this->Reminder->ReminderType->find('list');
		$houses = $this->Reminder->House->find('list');
		$this->set(compact('reminderTypes', 'houses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reminder->save($this->request->data)) {
				$this->Flash->success(__('The reminder has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reminder could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
			$this->request->data = $this->Reminder->find('first', $options);
		}
		$reminderTypes = $this->Reminder->ReminderType->find('list');
		$houses = $this->Reminder->House->find('list');
		$this->set(compact('reminderTypes', 'houses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reminder->delete()) {
			$this->Flash->success(__('The reminder has been deleted.'));
		} else {
			$this->Flash->error(__('The reminder could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Reminder->recursive = 0;
		$this->set('reminders', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
		$this->set('reminder', $this->Reminder->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Reminder->create();
			if ($this->Reminder->save($this->request->data)) {
				$this->Flash->success(__('The reminder has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reminder could not be saved. Please, try again.'));
			}
		}
		$reminderTypes = $this->Reminder->ReminderType->find('list');
		$houses = $this->Reminder->House->find('list');
		$this->set(compact('reminderTypes', 'houses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Reminder->exists($id)) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reminder->save($this->request->data)) {
				$this->Flash->success(__('The reminder has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The reminder could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
			$this->request->data = $this->Reminder->find('first', $options);
		}
		$reminderTypes = $this->Reminder->ReminderType->find('list');
		$houses = $this->Reminder->House->find('list');
		$this->set(compact('reminderTypes', 'houses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Reminder->id = $id;
		if (!$this->Reminder->exists()) {
			throw new NotFoundException(__('Invalid reminder'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Reminder->delete()) {
			$this->Flash->success(__('The reminder has been deleted.'));
		} else {
			$this->Flash->error(__('The reminder could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
