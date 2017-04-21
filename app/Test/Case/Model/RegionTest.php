<?php
App::uses('Region', 'Model');

/**
 * Region Test Case
 */
class RegionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.region',
		'app.country',
		'app.address',
		'app.address_type',
		'app.user',
		'app.house',
		'app.district',
		'app.order',
		'app.company',
		'app.travel_date',
		'app.reminder',
		'app.review',
		'app.special_offer',
		'app.value',
		'app.area',
		'app.selection',
		'app.article',
		'app.areas_article',
		'app.areas_house',
		'app.areas_region',
		'app.portal',
		'app.houses_portal',
		'app.portals_special_offer',
		'app.houses_travel_date'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Region = ClassRegistry::init('Region');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Region);

		parent::tearDown();
	}

}
