<?php

App::uses('AppController', 'Controller');

/**
 * Rooms Controller
 *
 * @property Room $Room
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RoomsController extends AppController {

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
        
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        $options = ['conditions' => ['Room.' . $this->Room->primaryKey => $id]];
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Room->create();
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('The room has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The room could not be saved. Please, try again.'));
            }
        }
        $houses = $this->Room->House->find('list');
        $this->set(compact('houses'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('The room has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The room could not be saved. Please, try again.'));
            }
        } else {
            $options = ['conditions' => ['Room.' . $this->Room->primaryKey => $id]];
            $this->request->data = $this->Room->find('first', $options);
        }
        $houses = $this->Room->House->find('list');
        $this->set(compact('houses'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Room->id = $id;
        if (!$this->Room->exists()) {
            throw new NotFoundException(__('Invalid room'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Room->delete()) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Room->recursive = 0;
        $this->set('rooms', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        $options = ['conditions' => ['Room.' . $this->Room->primaryKey => $id]];
        $this->set('room', $this->Room->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Room->create();
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('The room has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The room could not be saved. Please, try again.'));
            }
        }
        $houses = $this->Room->House->find('list');
        $this->set(compact('houses'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Room->exists($id)) {
            throw new NotFoundException(__('Invalid room'));
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Room->save($this->request->data)) {
                $this->Flash->success(__('The room has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The room could not be saved. Please, try again.'));
            }
        } else {
            $options = ['conditions' => ['Room.' . $this->Room->primaryKey => $id]];
            $this->request->data = $this->Room->find('first', $options);
        }
        $houses = $this->Room->House->find('list');
        $this->set(compact('houses'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Room->id = $id;
        if (!$this->Room->exists()) {
            throw new NotFoundException(__('Invalid room'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Room->delete()) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
