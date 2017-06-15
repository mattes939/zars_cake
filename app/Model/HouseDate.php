<?php

App::uses('AppModel', 'Model');

/**
 * HouseDate Model
 *
 * @property House $House
 * @property TravelDate $TravelDate
 * @property DateCondition $DateCondition
 * @property UnavailableDay $UnavailableDay
 */
class HouseDate extends AppModel {
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'House' => array(
            'className' => 'House',
            'foreignKey' => 'house_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'TravelDate' => array(
            'className' => 'TravelDate',
            'foreignKey' => 'travel_date_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'DateCondition' => array(
            'className' => 'DateCondition',
            'foreignKey' => 'date_condition_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'UnavailableDay' => array(
            'className' => 'UnavailableDay',
            'foreignKey' => 'house_date_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'house_date_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );

    public function generate($house_id = null, $travelDateId = null) {
        if (!empty($house_id)) {
            $travelDates = $this->TravelDate->find('list', [
                'conditions' => ['hidden' => false],
                'order' => ['start' => 'ASC'],
                'fields' => 'id'
            ]);

            foreach ($travelDates as $travelDate) {
                $houseDates[] = [
                    'house_id' => $house_id,
                    'travel_date_id' => $travelDate
                ];
            }
//              debug($houseDates);die;
            $this->saveMany($houseDates);
//              die;
        }
    }

    public function setCondition($id = null, $condition = null) {
        $houseDate = $this->find('first', [
            'conditions' => ['HouseDate.id' => $id],
            'fields' => ['house_id', 'travel_date_id']
        ]);
        $children = $this->House->children($houseDate['HouseDate']['house_id'], true, ['id']);

        if (!empty($children)) {
            $ids = Hash::extract($children, '{n}.House.id');
            $this->updateAll(['HouseDate.date_condition_id' => $condition], ['HouseDate.house_id' => $ids, 'HouseDate.travel_date_id' => $houseDate['HouseDate']['travel_date_id']]);
        }

        return $this->updateAll(['HouseDate.date_condition_id' => $condition], ['HouseDate.id' => $id]);
    }

}
