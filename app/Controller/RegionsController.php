<?php
App::uses('AppController', 'Controller');
/**
 * Regions Controller
 *
 * @property Region $Region
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RegionsController extends AppController {

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
		$this->Region->recursive = 0;
		$this->set('regions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($slug = null) {
        $region = $this->Region->find('first', [
            'conditions' => [
                'Region.slug' => $slug
            ],
            'contain' => [
                'House' => [
                    'fields' => ['id', 'name', 'created', 'code', 'slug'],
                    'Area' => [
                        'fields' => ['id','name']
                    ],
                    'Media' => [
                        'fields' => ['file'],
                        'order' => ['lft' => 'ASC'],
                        'limit' => 1
                    ],
                    'Room' => [
                        'conditions' => [
                            'NOT' => ['total_beds' => null]
                        ],
                        'fields' => 'total_beds',
                    ]
                ]
            ]
        ]);

//        debug($region);
        $this->set(compact('region'));
    }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Region->create();
			if ($this->Region->save($this->request->data)) {
				$this->Flash->success(__('The region has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The region could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Region->Country->find('list');
		$areas = $this->Region->Area->find('list');
		$this->set(compact('countries', 'areas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Region->save($this->request->data)) {
				$this->Flash->success(__('The region has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The region could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Region.' . $this->Region->primaryKey => $id]];
			$this->request->data = $this->Region->find('first', $options);
		}
		$countries = $this->Region->Country->find('list');
		$areas = $this->Region->Area->find('list');
		$this->set(compact('countries', 'areas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid region'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Region->delete()) {
			$this->Flash->success(__('The region has been deleted.'));
		} else {
			$this->Flash->error(__('The region could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Region->recursive = 0;
		$this->set('regions', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		$options = ['conditions' => ['Region.' . $this->Region->primaryKey => $id]];
		$this->set('region', $this->Region->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Region->create();
			if ($this->Region->save($this->request->data)) {
				$this->Flash->success(__('The region has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The region could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Region->Country->find('list');
		$areas = $this->Region->Area->find('list');
		$this->set(compact('countries', 'areas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Region->exists($id)) {
			throw new NotFoundException(__('Invalid region'));
		}
		if ($this->request->is(['post', 'put'])) {
			if ($this->Region->save($this->request->data)) {
				$this->Flash->success(__('The region has been saved.'));
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The region could not be saved. Please, try again.'));
			}
		} else {
			$options = ['conditions' => ['Region.' . $this->Region->primaryKey => $id]];
			$this->request->data = $this->Region->find('first', $options);
		}
		$countries = $this->Region->Country->find('list');
		$areas = $this->Region->Area->find('list');
		$this->set(compact('countries', 'areas'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Region->id = $id;
		if (!$this->Region->exists()) {
			throw new NotFoundException(__('Invalid region'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Region->delete()) {
			$this->Flash->success(__('The region has been deleted.'));
		} else {
			$this->Flash->error(__('The region could not be deleted. Please, try again.'));
		}
		return $this->redirect(['action' => 'index']);
	}
}
