<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Group $Group
 * @property Address $Address
 * @property House $House
 * @property Log $Log
 * @property Order $Order
 * @property Review $Review
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';
    public $virtualFields = [
        'full_name' => 'CONCAT(first_name, " ", last_name)',
        'account' => 'CONCAT(User.bank_account, "/", User.bank_code)'
    ];


    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
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
        'Address' => array(
            'className' => 'Address',
            'foreignKey' => 'user_id',
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
        'House' => array(
            'className' => 'House',
            'foreignKey' => 'user_id',
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
        'Log' => array(
            'className' => 'Log',
            'foreignKey' => 'user_id',
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
            'foreignKey' => 'user_id',
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
        'Review' => array(
            'className' => 'Review',
            'foreignKey' => 'user_id',
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

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
//        'username' => array(
//            'alphaNumeric' => array(
//                'rule' => 'alphaNumeric',
//                'required' => true,
//                'message' => 'Uživatelské jméno může obsahovat pouze písmena a číslice'
//            ),
//            'between' => array(
//                'rule' => array('between', 5, 15),
//                'message' => 'Uživatelské jméno musí obsahovat nejméně 5 a nejvíce 15 znaků'
//            )
//        ),
        'password' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//            'pwd' => array(
//			'notBlank' => array(
//				'rule' => array('notBlank'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
        'group_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
//                'current_password' => array(
//        'rule' => array('checkCurrentPassword'),
//        'message' => 'Nesprávné heslo!'
//    ),
//    'password1' => array(
//        'rule' => 'checkPasswordStrength',
//        'message' => '...',
//    ),
//    'password2' => array(
//        'rule' => 'passwordsMatch',
//        'message' => '...',
//    )
    );
    public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    public function majitelExists($id = null) {
        return (bool) $this->find('count', array(
                    'conditions' => array(
                        $this->alias . '.majitel' => $id
                    ),
                    'recursive' => -1,
                    'callbacks' => false
        ));
    }

    public function hideOldCustomers($email = null) {
        return $this->updateAll(['active' => 0], ['email' => $email, 'group_id' => 5]);
    }

}
