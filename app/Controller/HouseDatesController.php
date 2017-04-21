<?php

App::uses('AppController', 'Controller');

/**
 * HouseDates Controller
 *
 * @property HouseDate $HouseDate
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class HouseDatesController extends AppController {

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

//            $houses = $this->HouseDate->House->find('list', [
//                'fields' => ['id'],
//                'order' => ['id' => 'ASC']
//            ]);
//            $travelDates = $this->HouseDate->TravelDate->find('list', [
//                'fields' => ['id'],
//                'order' => ['id' => 'ASC']
//            ]);
//            
//            $houseDates = [];
//            $i = 0;
//            foreach($houses as $house){
//                foreach ($travelDates as $travelDate){
//                    $houseDates[$i]['house_id'] = $house;
//                    $houseDates[$i]['travel_date_id'] = $travelDate;
//                    $i++;
//                }
////            }
//        $houseDates = [];
//        $unavailableDays = [];
//        $i = 0;
//        foreach ($this->HouseDate->terminycastecneobsazene as $termin) {
//            if($this->HouseDate->House->exists($termin['ido'])&&$this->HouseDate->TravelDate->exists($termin['idt'])){
//                $houseDate = $this->HouseDate->find('first', [
//                'conditions' => [
//                    'house_id' => $termin['ido'],
//                    'travel_date_id' => $termin['idt']
//                ],
//                'fields' => ['id', 'house_id', 'travel_date_id', 'date_condition_id']
//            ]);
////            $houseDate['HouseDate']['date_condition_id'] = 3;
//            $unavailableDays[$i]['UnavailableDay']['house_date_id'] = $houseDate['HouseDate']['id'];
//            $unavailableDays[$i]['UnavailableDay']['date'] = $termin['den'];
////            $houseDates[] = $houseDate;
//            unset($houseDate);
//            $i++;
////            $this->HouseDate->updateAll('HouseDate.date_condition_id',
////                    ['HouseDate.house_id' => $termin['ido'], 'HouseDate.travel_date_id' => $termin['idt']]
////                    );
//            }
//            
////            if(!empty())
//            
//        }
//        debug($unavailableDays);
//        debug($this->HouseDate->saveMany($houseDates));
//        debug($this->HouseDate->UnavailableDay->saveMany($unavailableDays));

//            debug($houseDates);
//            debug($this->HouseDate->saveMany($houseDates));
//        $this->HouseDate->recursive = 0;
//        $this->set('houseDates', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->HouseDate->exists($id)) {
            throw new NotFoundException(__('Invalid house date'));
        }
        $options = array('conditions' => array('HouseDate.' . $this->HouseDate->primaryKey => $id));
        $this->set('houseDate', $this->HouseDate->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->HouseDate->create();
            if ($this->HouseDate->save($this->request->data)) {
                $this->Flash->success(__('The house date has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house date could not be saved. Please, try again.'));
            }
        }
        $houses = $this->HouseDate->House->find('list');
        $travelDates = $this->HouseDate->TravelDate->find('list');
        $dateConditions = $this->HouseDate->DateCondition->find('list');
        $this->set(compact('houses', 'travelDates', 'dateConditions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->HouseDate->exists($id)) {
            throw new NotFoundException(__('Invalid house date'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->HouseDate->save($this->request->data)) {
                $this->Flash->success(__('The house date has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house date could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('HouseDate.' . $this->HouseDate->primaryKey => $id));
            $this->request->data = $this->HouseDate->find('first', $options);
        }
        $houses = $this->HouseDate->House->find('list');
        $travelDates = $this->HouseDate->TravelDate->find('list');
        $dateConditions = $this->HouseDate->DateCondition->find('list');
        $this->set(compact('houses', 'travelDates', 'dateConditions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->HouseDate->id = $id;
        if (!$this->HouseDate->exists()) {
            throw new NotFoundException(__('Invalid house date'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->HouseDate->delete()) {
            $this->Flash->success(__('The house date has been deleted.'));
        } else {
            $this->Flash->error(__('The house date could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->HouseDate->recursive = 0;
        $this->set('houseDates', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->HouseDate->exists($id)) {
            throw new NotFoundException(__('Invalid house date'));
        }
        $options = array('conditions' => array('HouseDate.' . $this->HouseDate->primaryKey => $id));
        $this->set('houseDate', $this->HouseDate->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->HouseDate->create();
            if ($this->HouseDate->save($this->request->data)) {
                $this->Flash->success(__('The house date has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house date could not be saved. Please, try again.'));
            }
        }
        $houses = $this->HouseDate->House->find('list');
        $travelDates = $this->HouseDate->TravelDate->find('list');
        $dateConditions = $this->HouseDate->DateCondition->find('list');
        $this->set(compact('houses', 'travelDates', 'dateConditions'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->HouseDate->exists($id)) {
            throw new NotFoundException(__('Invalid house date'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->HouseDate->save($this->request->data)) {
                $this->Flash->success(__('The house date has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The house date could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('HouseDate.' . $this->HouseDate->primaryKey => $id));
            $this->request->data = $this->HouseDate->find('first', $options);
        }
        $houses = $this->HouseDate->House->find('list');
        $travelDates = $this->HouseDate->TravelDate->find('list');
        $dateConditions = $this->HouseDate->DateCondition->find('list');
        $this->set(compact('houses', 'travelDates', 'dateConditions'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->HouseDate->id = $id;
        if (!$this->HouseDate->exists()) {
            throw new NotFoundException(__('Invalid house date'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->HouseDate->delete()) {
            $this->Flash->success(__('The house date has been deleted.'));
        } else {
            $this->Flash->error(__('The house date could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
