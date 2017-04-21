<?php
App::uses('AppController', 'Controller');
/**
 * SpecialOffers Controller
 *
 * @property SpecialOffer $SpecialOffer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class SpecialOffersController extends AppController {

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
		$this->SpecialOffer->recursive = 0;
		$this->set('specialOffers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SpecialOffer->exists($id)) {
			throw new NotFoundException(__('Invalid special offer'));
		}
		$options = array('conditions' => array('SpecialOffer.' . $this->SpecialOffer->primaryKey => $id));
		$this->set('specialOffer', $this->SpecialOffer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SpecialOffer->create();
			if ($this->SpecialOffer->save($this->request->data)) {
				$this->Flash->success(__('The special offer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The special offer could not be saved. Please, try again.'));
			}
		}
		$parentSpecialOffers = $this->SpecialOffer->ParentSpecialOffer->find('list');
		$houses = $this->SpecialOffer->House->find('list');
		$portals = $this->SpecialOffer->Portal->find('list');
		$this->set(compact('parentSpecialOffers', 'houses', 'portals'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SpecialOffer->exists($id)) {
			throw new NotFoundException(__('Invalid special offer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SpecialOffer->save($this->request->data)) {
				$this->Flash->success(__('The special offer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The special offer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SpecialOffer.' . $this->SpecialOffer->primaryKey => $id));
			$this->request->data = $this->SpecialOffer->find('first', $options);
		}
		$parentSpecialOffers = $this->SpecialOffer->ParentSpecialOffer->find('list');
		$houses = $this->SpecialOffer->House->find('list');
		$portals = $this->SpecialOffer->Portal->find('list');
		$this->set(compact('parentSpecialOffers', 'houses', 'portals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->SpecialOffer->id = $id;
		if (!$this->SpecialOffer->exists()) {
			throw new NotFoundException(__('Invalid special offer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SpecialOffer->delete()) {
			$this->Flash->success(__('The special offer has been deleted.'));
		} else {
			$this->Flash->error(__('The special offer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SpecialOffer->recursive = 0;
		$this->set('specialOffers', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SpecialOffer->exists($id)) {
			throw new NotFoundException(__('Invalid special offer'));
		}
		$options = array('conditions' => array('SpecialOffer.' . $this->SpecialOffer->primaryKey => $id));
		$this->set('specialOffer', $this->SpecialOffer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SpecialOffer->create();
			if ($this->SpecialOffer->save($this->request->data)) {
				$this->Flash->success(__('The special offer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The special offer could not be saved. Please, try again.'));
			}
		}
		$parentSpecialOffers = $this->SpecialOffer->ParentSpecialOffer->find('list');
		$houses = $this->SpecialOffer->House->find('list');
		$portals = $this->SpecialOffer->Portal->find('list');
		$this->set(compact('parentSpecialOffers', 'houses', 'portals'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SpecialOffer->exists($id)) {
			throw new NotFoundException(__('Invalid special offer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SpecialOffer->save($this->request->data)) {
				$this->Flash->success(__('The special offer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The special offer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SpecialOffer.' . $this->SpecialOffer->primaryKey => $id));
			$this->request->data = $this->SpecialOffer->find('first', $options);
		}
		$parentSpecialOffers = $this->SpecialOffer->ParentSpecialOffer->find('list');
		$houses = $this->SpecialOffer->House->find('list');
		$portals = $this->SpecialOffer->Portal->find('list');
		$this->set(compact('parentSpecialOffers', 'houses', 'portals'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->SpecialOffer->id = $id;
		if (!$this->SpecialOffer->exists()) {
			throw new NotFoundException(__('Invalid special offer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SpecialOffer->delete()) {
			$this->Flash->success(__('The special offer has been deleted.'));
		} else {
			$this->Flash->error(__('The special offer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
