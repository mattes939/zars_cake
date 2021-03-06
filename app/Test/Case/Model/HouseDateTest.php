<?php
App::uses('HouseDate', 'Model');

/**
 * HouseDate Test Case
 */
class HouseDateTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.house_date',
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
		'app.travel_date_type',
		'app.reminder',
		'app.reminder_type',
		'app.review',
		'app.room',
		'app.special_offer',
		'app.portal',
		'app.houses_portal',
		'app.portals_special_offer',
		'app.date_condition',
		'app.houses_travel_date',
		'app.unavailable_day'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HouseDate = ClassRegistry::init('HouseDate');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HouseDate);

		parent::tearDown();
	}

}
