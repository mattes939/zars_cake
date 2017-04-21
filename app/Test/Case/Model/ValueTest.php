<?php
App::uses('Value', 'Model');

/**
 * Value Test Case
 */
class ValueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.value',
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
		'app.article',
		'app.areas_article',
		'app.areas_house',
		'app.areas_region',
		'app.order',
		'app.company',
		'app.travel_date',
		'app.travel_date_type',
		'app.houses_travel_date',
		'app.review',
		'app.reminder',
		'app.reminder_type',
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
		$this->Value = ClassRegistry::init('Value');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Value);

		parent::tearDown();
	}

}
