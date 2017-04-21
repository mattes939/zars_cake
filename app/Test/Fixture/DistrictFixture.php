<?php
/**
 * District Fixture
 */
class DistrictFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'region_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 85, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 85, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'html_title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'html_keywords' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'html_description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_districts_regions1_idx' => array('column' => 'region_id', 'unique' => 0)
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
			'region_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'slug' => 'Lorem ipsum dolor sit amet',
			'html_title' => 'Lorem ipsum dolor sit amet',
			'html_keywords' => 'Lorem ipsum dolor sit amet',
			'html_description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
