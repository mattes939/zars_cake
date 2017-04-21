<?php

App::uses('AppModel', 'Model');

/**
 * Property Model
 *
 * @property PropertyType $PropertyType
 * @property Selection $Selection
 * @property Value $Value
 */
class Property extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'PropertyType' => array(
            'className' => 'PropertyType',
            'foreignKey' => 'property_type_id',
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
        'Selection' => array(
            'className' => 'Selection',
            'foreignKey' => 'property_id',
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
        'Value' => array(
            'className' => 'Value',
            'foreignKey' => 'property_id',
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

    public function beforeSave($options = array()) {
        parent::beforeSave($options);

        // If the title is not empty, create/update the slug.
        if (!empty($this->data[$this->alias]['name'])) {
            $this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['title'], '-'));
        }
        // If menu title is empty, create one from title
//        if ($this->data[$this->alias]['menu_title'] == '') {
//            $this->data[$this->alias]['menu_title'] = $this->data[$this->alias]['title'];
//        }
        // Returning true is important otherwise the save or saveAll call will fail.
        return true;
    }

}
