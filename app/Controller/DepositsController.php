<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Deposits Controller
 *
 * @property Deposit $Deposit
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class DepositsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = ['Paginator', 'Session', 'Flash'];

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Deposit->recursive = 0;
        $this->set('deposits', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Deposit->exists($id)) {
            throw new NotFoundException(__('Invalid deposit'));
        }
        $options = ['conditions' => ['Deposit.' . $this->Deposit->primaryKey => $id]];
        $this->set('deposit', $this->Deposit->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Deposit->create();
            if ($this->Deposit->save($this->request->data)) {
                $this->Flash->success(__('The deposit has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deposit could not be saved. Please, try again.'));
            }
        }
        $orders = $this->Deposit->Order->find('list');
        $depositTypes = $this->Deposit->DepositType->find('list');
        $this->set(compact('orders', 'depositTypes'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Deposit->exists($id)) {
            throw new NotFoundException(__('Invalid deposit'));
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Deposit->save($this->request->data)) {
                $this->Flash->success(__('The deposit has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deposit could not be saved. Please, try again.'));
            }
        } else {
            $options = ['conditions' => ['Deposit.' . $this->Deposit->primaryKey => $id]];
            $this->request->data = $this->Deposit->find('first', $options);
        }
        $orders = $this->Deposit->Order->find('list');
        $depositTypes = $this->Deposit->DepositType->find('list');
        $this->set(compact('orders', 'depositTypes'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Deposit->id = $id;
        if (!$this->Deposit->exists()) {
            throw new NotFoundException(__('Invalid deposit'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Deposit->delete()) {
            $this->Flash->success(__('The deposit has been deleted.'));
        } else {
            $this->Flash->error(__('The deposit could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function admin_confirm($id = null) {
        if (!$this->Deposit->exists($id)) {
            throw new NotFoundException(__('Invalid deposit'));
        }
        $deposit = $this->Deposit->find('first', [
            'conditions' => ['Deposit.id' => $id],
            'contain' => [
                'DepositType',
                'Order' => [
                    'User',
                    'HouseDate' => [
                        'House'
                    ]
                ],
            ]
        ]);
//        debug($deposit);die;
        $this->autoRender = false;
        $email = new CakeEmail('smtp');
        $email->to($deposit['Order']['User']['email'], $deposit['Order']['User']['full_name'])
                ->viewVars(['deposit' => $deposit])
                ->helpers(['Html', 'Time'])
                ->emailFormat('html')
                ->template('customer_deposit', 'default')
                ->subject('Potvrzení platby - '. $deposit['DepositType']['name']);
        $email->send();
        $this->Deposit->updateAll(['Deposit.confirmed' => 'CURDATE()'], ['Deposit.id' => $id]);
        $this->Flash->set('Potvrzení odesláno.');
        
        return $this->redirect(['controller' => 'orders', 'action' => 'edit', $deposit['Order']['id']]);
    }

}
