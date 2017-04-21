<?php
App::uses('Room', 'Model');

/**
 * Room Test Case
 */
class RoomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.room',
		'app.house',
		'app.user',
		'app.group',
		'app.address',
		'app.address_type',
		'app.country',
		'app.region',
		'app.district',
		'app.area',
		'app.selection',
		'app.property',
		'app.property_type',
		'app.value',
		'app.article',
		'app.areas_article',
		'app.areas_house',
		'app.areas_region',
		'app.log',
		'app.order',
		'app.company',
		'app.travel_date',
		'app.houses_travel_date',
		'app.reminder',
		'app.reminder_type',
		'app.review',
		'app.special_offer',
		'app.portal',
		'app.houses_portal',
		'app.portals_special_offer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Room = ClassRegistry::init('Room');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Room);

		parent::tearDown();
	}

}
