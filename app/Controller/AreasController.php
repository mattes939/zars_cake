<?php

App::uses('AppController', 'Controller');

/**
 * Areas Controller
 *
 * @property Area $Area
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AreasController extends AppController {

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
        $this->Area->recursive = 0;
        $this->set('areas', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($slug = null) {
        $area = $this->Area->find('first', [
            'conditions' => [
                'Area.slug' => $slug
            ],
            'contain' => [
                'House' => [
                    'fields' => ['name', 'created', 'code', 'slug'],
                    'Area' => [
                        'fields' => ['name']
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
//        if (!$this->Area->exists($id)) {
//            throw new NotFoundException(__('Invalid area'));
//        }
        $this->set(compact('area'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Area->create();
            if ($this->Area->save($this->request->data)) {
                $this->Flash->success(__('The area has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The area could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Area->Article->find('list');
        $houses = $this->Area->House->find('list');
        $regions = $this->Area->Region->find('list');
        $this->set(compact('articles', 'houses', 'regions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Area->exists($id)) {
            throw new NotFoundException(__('Invalid area'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Area->save($this->request->data)) {
                $this->Flash->success(__('The area has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The area could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
            $this->request->data = $this->Area->find('first', $options);
        }
        $articles = $this->Area->Article->find('list');
        $houses = $this->Area->House->find('list');
        $regions = $this->Area->Region->find('list');
        $this->set(compact('articles', 'houses', 'regions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Area->id = $id;
        if (!$this->Area->exists()) {
            throw new NotFoundException(__('Invalid area'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Area->delete()) {
            $this->Flash->success(__('The area has been deleted.'));
        } else {
            $this->Flash->error(__('The area could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Area->recursive = 0;
        $this->set('areas', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Area->exists($id)) {
            throw new NotFoundException(__('Invalid area'));
        }
        $options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
        $this->set('area', $this->Area->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Area->create();
            if ($this->Area->save($this->request->data)) {
                $this->Flash->success(__('The area has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The area could not be saved. Please, try again.'));
            }
        }
        $articles = $this->Area->Article->find('list');
        $houses = $this->Area->House->find('list');
        $regions = $this->Area->Region->find('list');
        $this->set(compact('articles', 'houses', 'regions'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Area->exists($id)) {
            throw new NotFoundException(__('Invalid area'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Area->save($this->request->data)) {
                $this->Flash->success(__('The area has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The area could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Area.' . $this->Area->primaryKey => $id));
            $this->request->data = $this->Area->find('first', $options);
        }
        $articles = $this->Area->Article->find('list');
        $houses = $this->Area->House->find('list');
        $regions = $this->Area->Region->find('list');
        $this->set(compact('articles', 'houses', 'regions'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Area->id = $id;
        if (!$this->Area->exists()) {
            throw new NotFoundException(__('Invalid area'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Area->delete()) {
            $this->Flash->success(__('The area has been deleted.'));
        } else {
            $this->Flash->error(__('The area could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
