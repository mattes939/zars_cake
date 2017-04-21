<?php
/**
 * HouseDate Fixture
 */
class HouseDateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'house_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'travel_date_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'date_condition_id' => array('type' => 'integer', 'null' => true, 'default' => '1', 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_house_dates_houses1_idx' => array('column' => 'house_id', 'unique' => 0),
			'fk_house_dates_date_conditions1_idx' => array('column' => 'date_condition_id', 'unique' => 0),
			'fk_house_dates_travel_dates1_idx' => array('column' => 'travel_date_id', 'unique' => 0)
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
			'house_id' => 1,
			'travel_date_id' => 1,
			'date_condition_id' => 1,
			'created' => '2017-01-19 11:47:25',
			'modified' => '2017-01-19 11:47:25'
		),
	);

}
