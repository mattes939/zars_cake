<?php

App::uses('AppModel', 'Model');

/**
 * House Model
 *
 * @property Address $Address
 * @property User $User
 * @property Region $Region
 * @property District $District
 * @property HouseDate $HouseDate
 * @property Order $Order
 * @property Review $Review
 * @property Room $Room
 * @property SpecialOffer $SpecialOffer
 * @property Value $Value
 * @property Area $Area
 * @property Portal $Portal
 */
class House extends AppModel {

    public $actsAs = ['Media.Media' => [
            'path' => './files/images/houses/%id/%f',
        ],
        'Tree'
    ];

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    
    public $virtualFields = ['full_name' => 'CONCAT(House.name, " - ", House.code)'];


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasOne associations
     *
     * @var array
     */
    public $hasOne = [
        'Address' => [
            'className' => 'Address',
            'foreignKey' => 'house_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ]
    ];

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = [
        'User' => [
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'Region' => [
            'className' => 'Region',
            'foreignKey' => 'region_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'District' => [
            'className' => 'District',
            'foreignKey' => 'district_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ],
        'Pricelist' => [
            'className' => 'Pricelist',
            'foreignKey' => 'pricelist_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ]
    ];

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = [
        'HouseDate' => [
            'className' => 'HouseDate',
            'foreignKey' => 'house_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
//        'Order' => array(
//            'className' => 'Order',
//            'foreignKey' => 'house_id',
//            'dependent' => false,
//            'conditions' => '',
//            'fields' => '',
//            'order' => '',
//            'limit' => '',
//            'offset' => '',
//            'exclusive' => '',
//            'finderQuery' => '',
//            'counterQuery' => ''
//        ),
        'Review' => [
            'className' => 'Review',
            'foreignKey' => 'house_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
        'Room' => [
            'className' => 'Room',
            'foreignKey' => 'house_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
        'SpecialOffer' => [
            'className' => 'SpecialOffer',
            'foreignKey' => 'house_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
        'Value' => [
            'className' => 'Value',
            'foreignKey' => 'house_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ],
          'Price' => [
            'className' => 'Price',
            'foreignKey' => 'house_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ]
    ];

    /**
     * hasAndBelongsToMany associations
     *
     * @var array
     */
    public $hasAndBelongsToMany = [
        'Area' => [
            'className' => 'Area',
            'joinTable' => 'areas_houses',
            'foreignKey' => 'house_id',
            'associationForeignKey' => 'area_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ],
        'Portal' => [
            'className' => 'Portal',
            'joinTable' => 'houses_portals',
            'foreignKey' => 'house_id',
            'associationForeignKey' => 'portal_id',
            'unique' => 'keepExisting',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
        ]
    ];

    public function search($country = null, $area = null, $travelDate = null, $persons = null, $bedrooms = null) {

        if (!empty($country) && empty($area)) {
            $areaHouses = $this->Area->find('all', [
                'conditions' => ['country_id' => $country],
                'contain' => ['House' => ['fields' => 'id']],
                'fields' => ['Area.id']
            ]);
            $conditions = [];
            foreach ($areaHouses as $areaHouse) {
                if (!empty($areaHouse)) {
                    $conditions = array_merge($conditions, $areaHouse['House']);
                }
            }
//            debug($conditions);
            $conditions = array_unique(Hash::extract($conditions, '{n}.id'));
//            debug(count($conditions));
        } elseif (!empty($area)) {
            $conditions = $this->Area->find('first', [
                'conditions' => ['id' => $area],
                'contain' => ['House' => ['fields' => 'id']],
                'fields' => ['Area.id']
            ]);

            $conditions = Hash::extract($conditions['House'], '{n}.id');
//            debug($conditions);
        }
//        $conditions = $areaCondition;

        if (!empty($travelDate)) {
            $dateCondition = $this->HouseDate->find('list', [
                'conditions' => [
                    'travel_date_id' => $travelDate,
                    'date_condition_id' => [1, 3]
                ],
                'contain' => [
                    'House' => [
                        'fields' => ['id']
                    ]
                ],
                'fields' => ['HouseDate.id', 'House.id']
            ]);
//            debug($dateCondition);
            $conditions = array_intersect($conditions, $dateCondition);
        }
        if (!empty($persons)) {
//            $rooms = $this->Room->find('all', [
//                'fields' => ['house_id', 'SUM(total_beds) + SUM(extra_beds)'],
//                'group' => ['house_id'],
////                'conditions' => ['SUM(total_beds) + SUM(extra_beds) >=' => $persons]
//            ]);
            $db = $this->getDataSource();
            $rooms = $db->fetchAll('select `Room`.`house_id` as house from
(
SELECT `Room`.`house_id`, SUM(total_beds) + SUM(extra_beds) as capacity FROM `zars_cz`.`rooms` AS `Room` WHERE 1 = 1 GROUP BY house_id
) as `Room`
where capacity > :persons', ['persons' => $persons]);
//            debug($rooms);
            $personsCondition = Hash::extract($rooms, '{n}.Room.house');
//            debug($personsCondition);die;
//            switch ($persons) {
//                case 1:
//                    $personsCondition = $this->_filterRooms($rooms, 1, 8);
//                    break;
//                case 2:
//                    $personsCondition = $this->_filterRooms($rooms, 9, 15);
//                    break;
//                case 3:
//                    $personsCondition = $this->_filterRooms($rooms, 16, 999);
//                    break;
//            }
            $conditions = array_intersect($conditions, $personsCondition);
//            debug(count($personsCondition));
        }
        if (!empty($bedrooms)) {
            $bedroomsCondition = $this->Value->find('list', [
                'conditions' => [
                    'property_id' => 83,
                    'value >=' => $bedrooms
                ],
                'fields' => ['id', 'house_id']
            ]);
            $conditions = array_intersect($conditions, $bedroomsCondition);
        }
//        debug($conditions);
        $houses = $this->find('all', [
            'conditions' => [
                'active' => 1,
                'id' => $conditions
            ],
            'fields' => ['name', 'created', 'code', 'slug'],
            'contain' => [
                'Area' => [
                    'fields' => ['name']
                ],
                'Media' => [
                    'fields' => ['file'],
                    'order' => ['lft' => 'ASC'],
                    'limit' => 1
                ],
                'Room' => [
                    'conditions' => [
                        'NOT' => ['total_beds' => null]
                    ],
                    'fields' => 'total_beds',
                ]
            ]
        ]);

        return $houses;
    }

    private function _filterRooms($rooms = null, $min = null, $max = null) {
        foreach ($rooms as $room) {
            if ($room[0]['SUM(total_beds)'] >= $min && $room[0]['SUM(total_beds)'] <= $max) {
                $personsCondition[] = $room['Room']['house_id'];
            }
        }

        return $personsCondition;
    }

}
