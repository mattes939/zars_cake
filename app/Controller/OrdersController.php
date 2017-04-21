<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OrdersController extends AppController {

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
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 0);
            $orders = [];
            $i = 0;
            foreach($this->Order->objednavka as $objednavka){
                $orders[$i]['Order']['id'] = $objednavka['id'];
                $orders[$i]['Order']['order_status_id'] = $objednavka['stav']+1;
                if($this->Order->House->exists($objednavka['ido'])){
                    $orders[$i]['Order']['house_id'] = $objednavka['ido'];
                }
                
                $user = $this->Order->User->find('first', [
                    'conditions' => ['zakaznik' => $objednavka['idz']],
                    'fields' => ['id', 'zakaznik']
                ]);
                if(!empty($user)){
                    $orders[$i]['Order']['user_id'] = $user['User']['id'];
                }
                
                if($objednavka['datum']!=0){
                    $orders[$i]['Order']['travel_date_id'] = $objednavka['datum'];
                }
                $orders[$i]['Order']['animals'] = $objednavka['zvire'];
                $orders[$i]['Order']['animals_details'] = $objednavka['zvirejake'];
                $orders[$i]['Order']['employer_contribution'] = $objednavka['prispevek'];
                $orders[$i]['Order']['attendants'] = $objednavka['pocetosob'];
                $orders[$i]['Order']['adults'] = $objednavka['dospeli'];
                $orders[$i]['Order']['young'] = $objednavka['mladez'];
                $orders[$i]['Order']['children'] = $objednavka['deti'];
                $orders[$i]['Order']['comment'] = $objednavka['text'];
                $orders[$i]['Order']['created'] = $objednavka['datumobjednavky'];
                $orders[$i]['Order']['code'] = $objednavka['prcislo'];
                $orders[$i]['Order']['confirmed'] = $objednavka['potvrzenadne'];
                $orders[$i]['Order']['canceled'] = $objednavka['stornovanadne'];
                $orders[$i]['Order']['pp'] = $objednavka['pp'];
                $orders[$i]['Order']['company_id'] = $objednavka['cac'];
                $orders[$i]['Order']['start_day'] = $objednavka['datumnastup'];
                $orders[$i]['Order']['end_day'] = $objednavka['datumukonceni'];
                $orders[$i]['Order']['start_time'] = $objednavka['casnastupu'];
                $orders[$i]['Order']['end_time'] = $objednavka['casukonceni'];
                $orders[$i]['Order']['customer_date'] = $objednavka['terminzakaznik'];
                $orders[$i]['Order']['price'] = $objednavka['cena'];
                $orders[$i]['Order']['discount'] = $objednavka['sleva'];
                $orders[$i]['Order']['final_price'] = $objednavka['vyslednacena'];
                $orders[$i]['Order']['provision'] = $objednavka['provizeprocenta']/100;
                $orders[$i]['Order']['provision_reg'] = $objednavka['provizeregprocenta']/100;
                $orders[$i]['Order']['notes'] = $objednavka['poznamka'];
                $orders[$i]['Order']['billing_price'] = $objednavka['fakturacnicena'];
                $i++;
            }
            
//            debug($this->Order->saveMany($orders));
            
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Order->Company->find('list');
		$users = $this->Order->User->find('list');
		$houses = $this->Order->House->find('list');
		$travelDates = $this->Order->TravelDate->find('list');
		$this->set(compact('companies', 'users', 'houses', 'travelDates'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$companies = $this->Order->Company->find('list');
		$users = $this->Order->User->find('list');
		$houses = $this->Order->House->find('list');
		$travelDates = $this->Order->TravelDate->find('list');
		$this->set(compact('companies', 'users', 'houses', 'travelDates'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Order->Company->find('list');
		$users = $this->Order->User->find('list');
		$houses = $this->Order->House->find('list');
		$travelDates = $this->Order->TravelDate->find('list');
		$this->set(compact('companies', 'users', 'houses', 'travelDates'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Flash->success(__('The order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$companies = $this->Order->Company->find('list');
		$users = $this->Order->User->find('list');
		$houses = $this->Order->House->find('list');
		$travelDates = $this->Order->TravelDate->find('list');
		$this->set(compact('companies', 'users', 'houses', 'travelDates'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->delete()) {
			$this->Flash->success(__('The order has been deleted.'));
		} else {
			$this->Flash->error(__('The order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
