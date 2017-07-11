<?php
App::uses('AppController', 'Controller');
/**
 * TravelDateTypes Controller
 *
 * @property TravelDateType $TravelDateType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class TravelDateTypesController extends AppController {

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
		$this->TravelDateType->recursive = 0;
		$this->set('travelDateTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TravelDateType->exists($id)) {
			throw new NotFoundException(__('Invalid travel date type'));
		}
		$options = ['conditions' => ['TravelDateType.' . $this->TravelDateType->primaryKey => $id]];
		$this->set('travelDateType', $this->TravelDateType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TravelDateType->create();
			if ($this->TravelDateType->save($this->request->data)) {
				$this->Flash->success(__('The travel date type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The travel date type could not be saved. Please, try again.'));
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
		if (!$this->TravelDateType->exists($id)) {
			throw new NotFoundException(__('Invalid travel date type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->TravelDateType->save($this->request->data)) {
				$this->Flash->success(__('The travel date type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The travel date type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['TravelDateType.' . $this->TravelDateType->primaryKey => $id]];
			$this->request->data = $this->TravelDateType->find('first', $options);
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
		$this->TravelDateType->id = $id;
		if (!$this->TravelDateType->exists()) {
			throw new NotFoundException(__('Invalid travel date type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TravelDateType->delete()) {
			$this->Flash->success(__('The travel date type has been deleted.'));
		} else {
			$this->Flash->error(__('The travel date type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TravelDateType->recursive = 0;
		$this->set('travelDateTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TravelDateType->exists($id)) {
			throw new NotFoundException(__('Invalid travel date type'));
		}
		$options = ['conditions' => ['TravelDateType.' . $this->TravelDateType->primaryKey => $id]];
		$this->set('travelDateType', $this->TravelDateType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TravelDateType->create();
			if ($this->TravelDateType->save($this->request->data)) {
				$this->Flash->success(__('The travel date type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The travel date type could not be saved. Please, try again.'));
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
		if (!$this->TravelDateType->exists($id)) {
			throw new NotFoundException(__('Invalid travel date type'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->TravelDateType->save($this->request->data)) {
				$this->Flash->success(__('The travel date type has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The travel date type could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['TravelDateType.' . $this->TravelDateType->primaryKey => $id]];
			$this->request->data = $this->TravelDateType->find('first', $options);
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
		$this->TravelDateType->id = $id;
		if (!$this->TravelDateType->exists()) {
			throw new NotFoundException(__('Invalid travel date type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TravelDateType->delete()) {
			$this->Flash->success(__('The travel date type has been deleted.'));
		} else {
			$this->Flash->error(__('The travel date type could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
