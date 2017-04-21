<?php
/**
 * Address Fixture
 */
class AddressFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'address_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'street' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'city' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'psc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 5, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'house_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'house_id'), 'unique' => 1),
			'fk_addresses_users1_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_addresses_address_types1_idx' => array('column' => 'address_type_id', 'unique' => 0),
			'fk_addresses_houses1_idx' => array('column' => 'house_id', 'unique' => 0),
			'fk_addresses_countries1_idx' => array('column' => 'country_id', 'unique' => 0)
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
			'address_type_id' => 1,
			'user_id' => 1,
			'street' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'psc' => 'Lor',
			'house_id' => 1,
			'country_id' => 1,
			'created' => '2017-01-13 13:16:30',
			'modified' => '2017-01-13 13:16:30'
		),
	);

}
