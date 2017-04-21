<?php
/**
 * Order Fixture
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => true, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'house_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'travel_date_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'attendants' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'adults' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'young' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'children' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'comment' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'confirmed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'canceled' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'start_day' => array('type' => 'date', 'null' => true, 'default' => null),
		'end_day' => array('type' => 'date', 'null' => true, 'default' => null),
		'start_time' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'end_time' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'employer_contribution' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'animals' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'animals_details' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'discount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'final_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'provision' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '4,3', 'unsigned' => false),
		'provision_reg' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '4,3', 'unsigned' => false),
		'billing_price' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'notes' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_orders_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_orders_properties1_idx' => array('column' => 'house_id', 'unique' => 0),
			'fk_orders_travel_dates1_idx' => array('column' => 'travel_date_id', 'unique' => 0),
			'fk_orders_companies1_idx' => array('column' => 'company_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_czech_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'company_id' => 1,
			'user_id' => 1,
			'house_id' => 1,
			'travel_date_id' => 1,
			'attendants' => 1,
			'adults' => 1,
			'young' => 1,
			'children' => 1,
			'comment' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-01-13 13:41:00',
			'confirmed' => '2017-01-13 13:41:00',
			'canceled' => '2017-01-13 13:41:00',
			'start_day' => '2017-01-13',
			'end_day' => '2017-01-13',
			'start_time' => 'Lorem ipsum dolor sit amet',
			'end_time' => 'Lorem ipsum dolor sit amet',
			'employer_contribution' => 1,
			'animals' => 1,
			'animals_details' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'discount' => 1,
			'final_price' => 1,
			'provision' => '',
			'provision_reg' => '',
			'billing_price' => 1,
			'notes' => 'Lorem ipsum dolor sit amet',
			'modified' => '2017-01-13 13:41:00'
		),
	);

}
