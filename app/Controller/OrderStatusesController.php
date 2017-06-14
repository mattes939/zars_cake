<?php
App::uses('AppController', 'Controller');
/**
 * OrderStatuses Controller
 *
 * @property OrderStatus $OrderStatus
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OrderStatusesController extends AppController {

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
		$this->OrderStatus->recursive = 0;
		$this->set('orderStatuses', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrderStatus->exists($id)) {
			throw new NotFoundException(__('Invalid order status'));
		}
		$options = array('conditions' => array('OrderStatus.' . $this->OrderStatus->primaryKey => $id));
		$this->set('orderStatus', $this->OrderStatus->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrderStatus->create();
			if ($this->OrderStatus->save($this->request->data)) {
				$this->Flash->success(__('The order status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order status could not be saved. Please, try again.'));
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
		if (!$this->OrderStatus->exists($id)) {
			throw new NotFoundException(__('Invalid order status'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrderStatus->save($this->request->data)) {
				$this->Flash->success(__('The order status has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order status could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrderStatus.' . $this->OrderStatus->primaryKey => $id));
			$this->request->data = $this->OrderStatus->find('first', $options);
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
		$this->OrderStatus->id = $id;
		if (!$this->OrderStatus->exists()) {
			throw new NotFoundException(__('Invalid order status'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrderStatus->delete()) {
			$this->Flash->success(__('The order status has been deleted.'));
		} else {
			$this->Flash->error(__('The order status could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
