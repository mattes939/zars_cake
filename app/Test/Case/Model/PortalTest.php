<?php
App::uses('Portal', 'Model');

/**
 * Portal Test Case
 */
class PortalTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.portal',
		'app.house',
		'app.user',
		'app.region',
		'app.district',
		'app.address',
		'app.address_type',
		'app.country',
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
		'app.houses_portal',
		'app.houses_travel_date',
		'app.portals_special_offer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Portal = ClassRegistry::init('Portal');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Portal);

		parent::tearDown();
	}

}
