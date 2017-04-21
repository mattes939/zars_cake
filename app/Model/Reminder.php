<?php
App::uses('AppModel', 'Model');
/**
 * Reminder Model
 *
 * @property Order $Order
 * @property ReminderType $ReminderType
 */
class Reminder extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ReminderType' => array(
			'className' => 'ReminderType',
			'foreignKey' => 'reminder_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
