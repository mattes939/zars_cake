<?php

App::uses('AppController', 'Controller');

/**
 * Districts Controller
 *
 * @property District $District
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DistrictsController extends AppController {

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
        $this->District->recursive = 0;
        $this->set('districts', $this->Paginator->paginate());
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->District->recursive = 0;
        $this->set('districts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->District->exists($id)) {
            throw new NotFoundException(__('Invalid district'));
        }
        $options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
        $this->set('district', $this->District->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->District->create();
            if ($this->District->save($this->request->data)) {
                $this->Flash->success(__('The district has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The district could not be saved. Please, try again.'));
            }
        }
        $regions = $this->District->Region->find('list');
        $this->set(compact('regions'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->District->exists($id)) {
            throw new NotFoundException(__('Invalid district'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->District->save($this->request->data)) {
                $this->Flash->success(__('The district has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The district could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('District.' . $this->District->primaryKey => $id));
            $this->request->data = $this->District->find('first', $options);
        }
        $regions = $this->District->Region->find('list');
        $this->set(compact('regions'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->District->id = $id;
        if (!$this->District->exists()) {
            throw new NotFoundException(__('Invalid district'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->District->delete()) {
            $this->Flash->success(__('The district has been deleted.'));
        } else {
            $this->Flash->error(__('The district could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
