<?php
/**
 * SpecialOffer Fixture
 */
class SpecialOfferFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'house_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'content' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'from' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'to' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'referential' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'hidden' => array('type' => 'boolean', 'null' => true, 'default' => '0'),
		'html_title' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'html_keywords' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'html_description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 245, 'collate' => 'utf8_czech_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_special_offers_houses1_idx' => array('column' => 'house_id', 'unique' => 0)
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
			'lft' => 1,
			'rght' => 1,
			'parent_id' => 1,
			'house_id' => 1,
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'from' => '2017-01-13 13:44:27',
			'to' => '2017-01-13 13:44:27',
			'referential' => 1,
			'hidden' => 1,
			'html_title' => 'Lorem ipsum dolor sit amet',
			'html_keywords' => 'Lorem ipsum dolor sit amet',
			'html_description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
