<?php

App::uses('AppController', 'Controller');

/**
 * Audits Controller
 *
 * @property Audit $Audit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class AuditsController extends AppController {

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
    public function admin_index($userId = null) {
        $conditions = [];
        if ($userId != null) {
            $conditions['source_id'] = $userId;
        }

        $audits = $this->Audit->find('all', [
            'conditions' => $conditions,
            'order' => ['created' => 'desc'],
            'group' => ['created']
        ]);
        
        $users = $this->Audit->find('list', [
            'group' => ['description'],
            'order' => ['description' => 'asc'],
            'fields' => ['source_id', 'description']
        ]);
        
        $this->set(compact('audits', 'users', 'userId'));
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Audit->exists($id)) {
            throw new NotFoundException(__('Invalid audit'));
        }
        $options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
        $this->set('audit', $this->Audit->find('first', $options));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Audit->id = $id;
        if (!$this->Audit->exists()) {
            throw new NotFoundException(__('Invalid audit'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Audit->delete()) {
            $this->Flash->success(__('The audit has been deleted.'));
        } else {
            $this->Flash->error(__('The audit could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
