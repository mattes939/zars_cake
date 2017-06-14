<?php
App::uses('AppController', 'Controller');
/**
 * Deposits Controller
 *
 * @property Deposit $Deposit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DepositsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Deposit->recursive = 0;
		$this->set('deposits', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Deposit->exists($id)) {
			throw new NotFoundException(__('Invalid deposit'));
		}
		$options = array('conditions' => array('Deposit.' . $this->Deposit->primaryKey => $id));
		$this->set('deposit', $this->Deposit->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Deposit->create();
			if ($this->Deposit->save($this->request->data)) {
				$this->Flash->success(__('The deposit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The deposit could not be saved. Please, try again.'));
			}
		}
		$orders = $this->Deposit->Order->find('list');
		$depositTypes = $this->Deposit->DepositType->find('list');
		$this->set(compact('orders', 'depositTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Deposit->exists($id)) {
			throw new NotFoundException(__('Invalid deposit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Deposit->save($this->request->data)) {
				$this->Flash->success(__('The deposit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The deposit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Deposit.' . $this->Deposit->primaryKey => $id));
			$this->request->data = $this->Deposit->find('first', $options);
		}
		$orders = $this->Deposit->Order->find('list');
		$depositTypes = $this->Deposit->DepositType->find('list');
		$this->set(compact('orders', 'depositTypes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Deposit->id = $id;
		if (!$this->Deposit->exists()) {
			throw new NotFoundException(__('Invalid deposit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Deposit->delete()) {
			$this->Flash->success(__('The deposit has been deleted.'));
		} else {
			$this->Flash->error(__('The deposit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
