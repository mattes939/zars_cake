<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Reminders Controller
 *
 * @property Reminder $Reminder
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class RemindersController extends AppController {

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
        $this->Reminder->recursive = 0;
        $this->set('reminders', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Reminder->exists($id)) {
            throw new NotFoundException(__('Invalid reminder'));
        }
        $options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id),
            'contain' => [
                'ReminderType'
            ]
            );
        $this->set('reminder', $this->Reminder->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add($depositId = null) {
//            $this->autoRender = false;
        if (!$this->Reminder->Deposit->exists($depositId)) {
            throw new NotFoundException(__('Invalid reminder'));
        }
//                $this->Reminder->sendReminder($orderId, $reminderTypeId);
        $text = $this->Reminder->composeText($depositId);
        $reminderTypes = $this->Reminder->ReminderType->find('list');
        if ($this->request->is('post')) {
            $this->request->data['Reminder']['deposit_id'] = $depositId;
//            debug($this->request->data);die;
            $this->Reminder->create();
            if ($this->Reminder->save($this->request->data)) {
                $email = new CakeEmail('smtp');
                $email->to($text['email'], $text['name'])
                        ->viewVars(['text' => $this->request->data['Reminder']['text']])
                        ->helpers(['Html', 'Time'])
                        ->emailFormat('html')
                        ->template('blank', 'default')
                        ->subject($this->request->data['Reminder']['subject'] . ' ('. $reminderTypes[$this->request->data['Reminder']['reminder_type_id']].')');
                $email->send();
                $this->Flash->success(__('The reminder has been saved.'));
                return $this->redirect(array('controller' => 'orders','action' => 'index'));
            } else {
                $this->Flash->error(__('The reminder could not be saved. Please, try again.'));
            }
        }
        

        $this->set(compact('reminderTypes', 'text'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Reminder->exists($id)) {
            throw new NotFoundException(__('Invalid reminder'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Reminder->save($this->request->data)) {
                $this->Flash->success(__('The reminder has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The reminder could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Reminder.' . $this->Reminder->primaryKey => $id));
            $this->request->data = $this->Reminder->find('first', $options);
        }
        $reminderTypes = $this->Reminder->ReminderType->find('list');
        $houses = $this->Reminder->House->find('list');
        $this->set(compact('reminderTypes', 'houses'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Reminder->id = $id;
        if (!$this->Reminder->exists()) {
            throw new NotFoundException(__('Invalid reminder'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Reminder->delete()) {
            $this->Flash->success(__('The reminder has been deleted.'));
        } else {
            $this->Flash->error(__('The reminder could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
