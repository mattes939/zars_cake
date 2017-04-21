<?php
/**
 * Room Fixture
 */
class RoomFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'house_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'floor' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'size' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,0', 'unsigned' => false),
		'heating' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 4, 'unsigned' => false),
		'single_beds' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'double_beds' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'bunk_beds' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'total_beds' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'extra_beds' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_rooms_houses1_idx' => array('column' => 'house_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'floor' => 'Lorem ipsum dolor sit amet',
			'size' => '',
			'heating' => 1,
			'single_beds' => 1,
			'double_beds' => 1,
			'bunk_beds' => 1,
			'total_beds' => 1,
			'extra_beds' => 1,
			'created' => '2017-01-18 10:38:27',
			'modified' => '2017-01-18 10:38:27'
		),
	);

}
