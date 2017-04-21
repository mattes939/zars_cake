<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class UsersController extends AppController {

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
//        var_dump(mail('matej.matejek@gmail.com', 'test', 'test'));
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
//        $this->autoRender = false;
        ini_set('max_execution_time', 0);
        if ($this->request->is('post')) {
            $this->User->Behaviors->attach('Tools.Passwordable', array('require' => false, 'confirm' => false));
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Common->flashMessage(__('Uživatel vytvořen.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Common->flashMessage(__('Chyba při ukládání uživatele.'));
                unset($this->request->data['User']['pwd']);
                //    unset($this->request->data['User']['pwd_repeat']);
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));

//        $customers = array();
//        $addresses = array();
//        $a = 1;
//        $i = 486;
//        foreach ($this->User->zakaznik as $zakaznik) {
//            
//            
//            $customers[$i]['User']['zakaznik'] = $zakaznik['id'];
////            $customers[$i]['User']['pin'] = $zakaznik['pin'];
//            $customers[$i]['User']['username'] = $zakaznik['email'];
//            
//            
//            $customers[$i]['User']['pwd'] = $zakaznik['heslo'];
//            $customers[$i]['User']['first_name'] = $zakaznik['jmeno'];
//            $customers[$i]['User']['last_name'] = $zakaznik['prijmeni'];
//            $customers[$i]['User']['degree'] = $zakaznik['titul'];
//            $customers[$i]['User']['phone1'] = $zakaznik['tel'];
//            $customers[$i]['User']['group_id'] = 5;
//            $customers[$i]['User']['birthday'] = $zakaznik['datumnarozeni'];
//            $customers[$i]['User']['hidden'] = $zakaznik['skryt'];
//            $customers[$i]['User']['id'] = $i;
//            $customers[$i]['User']['sex'] = $zakaznik['osloveni'];
//            $addresses[$a]['Address']['street'] = $zakaznik['ulice'];
//            $addresses[$a]['Address']['city'] = $zakaznik['mesto'];
//            $addresses[$a]['Address']['psc'] = $zakaznik['psc'];
//            if (in_array($zakaznik['zeme'], ['Slovensko', 'Slovenská republika', 'SR'])) {
//                $addresses[$a]['Address']['country_id'] = 2;
//            } else {
//                $addresses[$a]['Address']['country_id'] = 1;
//            }
//            $addresses[$a]['Address']['user_id'] = $i;
//            $addresses[$a]['Address']['address_type_id'] = 1;
////            $a++;
////            
////            $addresses[$a]['Address']['street'] = $zakaznik['korulice'];
////            $addresses[$a]['Address']['city'] = $zakaznik['kormesto'];
////            $addresses[$a]['Address']['psc'] = $zakaznik['korpsc'];
////            if (in_array($zakaznik['korzeme'], ['Slovensko', 'Slovenská republika'])) {
////                $addresses[$a]['Address']['country_id'] = 2;
////            } else {
////                $addresses[$a]['Address']['country_id'] = 1;
////            }
////            $addresses[$a]['Address']['user_id'] = $i;
////            $addresses[$a]['Address']['address_type_id'] = 2;
//            $a++;
//            $i++;
//        }
//        debug($addresses);
//        debug($customers);die;
//        foreach($customers as $customer){
////            $this->User->create();
//                    $this->User->Behaviors->attach('Tools.Passwordable', array('require' => false, 'confirm' => false));
////            $saveCustomer['User'] = $customer;
////            debug($saveCustomer);
////            debug($this->User->save($customer));
//            $this->User->save($customer);
//        }
        
//        debug($this->User->Address->saveAll($addresses));
//        debug($this->User->saveAll($customers));
//        echo $this->User->import_customers();

//        $zakaznikobjekt = $this->User->zakaznikobjekt;
//        $houses = array();
//        foreach ($zakaznikobjekt as $i => $mo) {
//            if ($this->User->House->exists($mo['ido']) &&
//                    $this->User->zakaznikExists($mo['zakaznik'])
//                    ) {
//                $zakaznik = $this->User->find('first', [
//                    'conditions' => ['zakaznik' => $mo['zakaznik']],
//                    'fields' => ['id']
//                ]);
//                
//                
//                $houses[$i]['House']['id'] = $mo['ido'];
//                $houses[$i]['House']['user_id'] = $zakaznik['User']['id'];
//            }
////            debug($this->User->House->exists($mo['ido']));
//        }
//        debug(count($houses));
//        debug($houses);
//        foreach($houses as $house){
//            if($this->User->House->exists($house['House']['id'])){
//                debug($this->User->House->save($house));
//            }
//        }
//        debug($this->User->House->saveMany($houses));
//        $houses = array();
//        foreach($this->User->texty as $i => $text){
//            if($this->User->House->exists($text['cid'])){
//                $houses[$i]['House']['id'] = $text['cid'];
//                $houses[$i]['House']['text_description'] = $text[3];
//                $houses[$i]['House']['text_location'] = $text[4];
//                $houses[$i]['House']['text_equipment'] = $text[5];
//                $houses[$i]['House']['text_summer_activities'] = $text[6];
//                $houses[$i]['House']['text_trips'] = $text[7];
//                $houses[$i]['House']['text_winter_activities'] = $text[8];
//                $houses[$i]['House']['text_activities'] = '';
//            }
//        }
//        debug($this->User->House->saveMany($houses));
//        $websites = array();
//        foreach($this->User->www as $i => $www){
//            if($this->User->House->exists($www['ido']) && !empty($www['adresa'])){
//                $websites[$i]['House']['id'] = $www['ido'];
//                $websites[$i]['House']['website'] = $www['adresa'];
//            }
//        }
//        debug($this->User->House->saveMany($websites));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->Behaviors->attach('Tools.Passwordable', array('require' => false, 'confirm' => false));
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Common->flashMessage(__('Uživatel vytvořen.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Common->flashMessage(__('Chyba při ukládání uživatele.'));
                unset($this->request->data['User']['pwd']);
                //    unset($this->request->data['User']['pwd_repeat']);
            }
        }
        $groups = $this->User->Group->find('list', array(
//            'conditions' => array('Group.id >' => 1)
        ));
        $this->set(compact('groups'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function initACL() {
        $group = $this->User->Group;

        // Allow admins to everything
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        // allow managers to posts and widgets
        $group->id = 2;
        $this->Acl->allow($group, 'controllers');
//        $this->Acl->deny($group, 'controllers');
//        $this->Acl->allow($group, 'controllers/Pages');
//        $this->Acl->allow($group, 'controllers/Users');
//        $this->Acl->allow($group, 'controllers/Groups');



        $group->id = 3;
        $this->Acl->allow($group, 'controllers');
//        $this->Acl->deny($group, 'controllers');
//        $this->Acl->allow($group, 'controllers/Pages');
//        $this->Acl->allow($group, 'controllers/users/logout');
//        $this->Acl->allow($group, 'controllers/users/changepassword');
//        $this->Acl->allow($group, 'controllers/users/admin_profile');


        $group->id = 4;
        $this->Acl->allow($group, 'controllers');

        $group->id = 5;
        $this->Acl->allow($group, 'controllers');

        echo "all done";
        exit;
    }

    public function login() {
        // $this->layout = 'login';
        $this->User->Behaviors->attach('Tools.Passwordable');
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Common->flashMessage(__('Nesprávné přihlašovací jméno nebo heslo.'));
        }
        if ($this->Session->read('Auth.User')) {
            $this->Common->flashMessage('Přihlášení proběhlo úspěšně!');
            return $this->redirect(['controller' => 'houses', 'action' => 'index', 'admin' => true]);
        }
        //    echo $this->Session->flash('auth');
    }

    public function logout() {
        //$this->Common->flashMessage('Nashledanou.');
        $this->Auth->logout();
        $this->layout = 'login';
        $this->redirect(array('action' => 'login'));
    }

}
