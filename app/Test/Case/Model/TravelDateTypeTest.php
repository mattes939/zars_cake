<?php
App::uses('TravelDateType', 'Model');

/**
 * TravelDateType Test Case
 */
class TravelDateTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.travel_date_type',
		'app.travel_date',
		'app.order',
		'app.company',
		'app.user',
		'app.group',
		'app.address',
		'app.address_type',
		'app.house',
		'app.region',
		'app.country',
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
		'app.review',
		'app.special_offer',
		'app.portal',
		'app.houses_portal',
		'app.portals_special_offer',
		'app.room',
		'app.houses_travel_date',
		'app.log',
		'app.reminder',
		'app.reminder_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TravelDateType = ClassRegistry::init('TravelDateType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TravelDateType);

		parent::tearDown();
	}

}
