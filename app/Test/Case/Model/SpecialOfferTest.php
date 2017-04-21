<?php
App::uses('SpecialOffer', 'Model');

/**
 * SpecialOffer Test Case
 */
class SpecialOfferTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.special_offer',
		'app.house',
		'app.user',
		'app.region',
		'app.country',
		'app.address',
		'app.address_type',
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
		'app.order',
		'app.company',
		'app.travel_date',
		'app.reminder',
		'app.reminder_type',
		'app.review',
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
		$this->SpecialOffer = ClassRegistry::init('SpecialOffer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SpecialOffer);

		parent::tearDown();
	}

}
