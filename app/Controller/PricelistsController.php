<?php
App::uses('AppController', 'Controller');
/**
 * Pricelists Controller
 *
 * @property Pricelist $Pricelist
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PricelistsController extends AppController {

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
		$this->Pricelist->recursive = 0;
		$this->set('pricelists', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Pricelist->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist'));
		}
		$options = array('conditions' => array('Pricelist.' . $this->Pricelist->primaryKey => $id));
		$this->set('pricelist', $this->Pricelist->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Pricelist->create();
			if ($this->Pricelist->save($this->request->data)) {
				$this->Flash->success(__('The pricelist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pricelist could not be saved. Please, try again.'));
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
		if (!$this->Pricelist->exists($id)) {
			throw new NotFoundException(__('Invalid pricelist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pricelist->save($this->request->data)) {
				$this->Flash->success(__('The pricelist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The pricelist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pricelist.' . $this->Pricelist->primaryKey => $id));
			$this->request->data = $this->Pricelist->find('first', $options);
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
		$this->Pricelist->id = $id;
		if (!$this->Pricelist->exists()) {
			throw new NotFoundException(__('Invalid pricelist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pricelist->delete()) {
			$this->Flash->success(__('The pricelist has been deleted.'));
		} else {
			$this->Flash->error(__('The pricelist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
