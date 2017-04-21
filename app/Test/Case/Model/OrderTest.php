<?php
App::uses('Order', 'Model');

/**
 * Order Test Case
 */
class OrderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order',
		'app.company',
		'app.user',
		'app.house',
		'app.region',
		'app.country',
		'app.address',
		'app.address_type',
		'app.district',
		'app.area',
		'app.selection',
		'app.article',
		'app.areas_article',
		'app.areas_house',
		'app.areas_region',
		'app.reminder',
		'app.reminder_type',
		'app.review',
		'app.special_offer',
		'app.value',
		'app.portal',
		'app.houses_portal',
		'app.portals_special_offer',
		'app.travel_date',
		'app.houses_travel_date'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Order = ClassRegistry::init('Order');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Order);

		parent::tearDown();
	}

}
