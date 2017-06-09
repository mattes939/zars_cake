<?php

App::uses('AppModel', 'Model');

/**
 * TravelDate Model
 *
 * @property TravelDateType $TravelDateType
 * @property HouseDate $HouseDate
 * @property Order $Order
 */
class TravelDate extends AppModel {
    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'TravelDateType' => array(
            'className' => 'TravelDateType',
            'foreignKey' => 'travel_date_type_id',
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
        'HouseDate' => array(
            'className' => 'HouseDate',
            'foreignKey' => 'travel_date_id',
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
            'foreignKey' => 'travel_date_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function travelDatesList() {
        $travelDates = $this->find('all', [
            'conditions' => [
                'hidden' => false,
                'start >= CURDATE()'
            ],
            'order' => ['start' => 'ASC'],
            'contain' => [
                'TravelDateType'
            ]
        ]);
        
        $formatedTravelDates = [];
        foreach ($travelDates as $travelDate){
            $start = date_format(date_create_from_format('Y-m-d', $travelDate['TravelDate']['start']), 'j. n. Y');
            $end = date_format(date_create_from_format('Y-m-d', $travelDate['TravelDate']['end']), 'j. n. Y');
            $formatedTravelDates[$travelDate['TravelDate']['id']] = $start . ' - ' . $end . ' - ' . $travelDate['TravelDateType']['name'];
        }
        
        return $formatedTravelDates;
    }

}
