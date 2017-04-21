<?php
App::uses('AppController', 'Controller');
/**
 * Portals Controller
 *
 * @property Portal $Portal
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PortalsController extends AppController {

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
		$this->Portal->recursive = 0;
		$this->set('portals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Portal->exists($id)) {
			throw new NotFoundException(__('Invalid portal'));
		}
		$options = array('conditions' => array('Portal.' . $this->Portal->primaryKey => $id));
		$this->set('portal', $this->Portal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Portal->create();
			if ($this->Portal->save($this->request->data)) {
				$this->Flash->success(__('The portal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The portal could not be saved. Please, try again.'));
			}
		}
		$houses = $this->Portal->House->find('list');
		$specialOffers = $this->Portal->SpecialOffer->find('list');
		$this->set(compact('houses', 'specialOffers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Portal->exists($id)) {
			throw new NotFoundException(__('Invalid portal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Portal->save($this->request->data)) {
				$this->Flash->success(__('The portal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The portal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Portal.' . $this->Portal->primaryKey => $id));
			$this->request->data = $this->Portal->find('first', $options);
		}
		$houses = $this->Portal->House->find('list');
		$specialOffers = $this->Portal->SpecialOffer->find('list');
		$this->set(compact('houses', 'specialOffers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Portal->id = $id;
		if (!$this->Portal->exists()) {
			throw new NotFoundException(__('Invalid portal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Portal->delete()) {
			$this->Flash->success(__('The portal has been deleted.'));
		} else {
			$this->Flash->error(__('The portal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Portal->recursive = 0;
		$this->set('portals', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Portal->exists($id)) {
			throw new NotFoundException(__('Invalid portal'));
		}
		$options = array('conditions' => array('Portal.' . $this->Portal->primaryKey => $id));
		$this->set('portal', $this->Portal->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Portal->create();
			if ($this->Portal->save($this->request->data)) {
				$this->Flash->success(__('The portal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The portal could not be saved. Please, try again.'));
			}
		}
		$houses = $this->Portal->House->find('list');
		$specialOffers = $this->Portal->SpecialOffer->find('list');
		$this->set(compact('houses', 'specialOffers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Portal->exists($id)) {
			throw new NotFoundException(__('Invalid portal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Portal->save($this->request->data)) {
				$this->Flash->success(__('The portal has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The portal could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Portal.' . $this->Portal->primaryKey => $id));
			$this->request->data = $this->Portal->find('first', $options);
		}
		$houses = $this->Portal->House->find('list');
		$specialOffers = $this->Portal->SpecialOffer->find('list');
		$this->set(compact('houses', 'specialOffers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Portal->id = $id;
		if (!$this->Portal->exists()) {
			throw new NotFoundException(__('Invalid portal'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Portal->delete()) {
			$this->Flash->success(__('The portal has been deleted.'));
		} else {
			$this->Flash->error(__('The portal could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
