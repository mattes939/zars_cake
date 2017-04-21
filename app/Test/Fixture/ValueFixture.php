<?php
/**
 * Value Fixture
 */
class ValueFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'house_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'property_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'true' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'value' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_values_properties1_idx' => array('column' => 'property_id', 'unique' => 0),
			'fk_values_houses1_idx' => array('column' => 'house_id', 'unique' => 0)
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
			'property_id' => 1,
			'true' => 1,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-01-13 13:46:17',
			'modified' => '2017-01-13 13:46:17'
		),
	);

}
