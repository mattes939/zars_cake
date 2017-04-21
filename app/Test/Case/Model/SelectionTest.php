<?php
App::uses('Selection', 'Model');

/**
 * Selection Test Case
 */
class SelectionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.selection',
		'app.area',
		'app.article',
		'app.areas_article',
		'app.house',
		'app.user',
		'app.region',
		'app.country',
		'app.address',
		'app.address_type',
		'app.district',
		'app.areas_region',
		'app.order',
		'app.company',
		'app.travel_date',
		'app.reminder',
		'app.reminder_type',
		'app.review',
		'app.special_offer',
		'app.value',
		'app.areas_house',
		'app.portal',
		'app.houses_portal',
		'app.portals_special_offer',
		'app.houses_travel_date',
		'app.property',
		'app.property_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Selection = ClassRegistry::init('Selection');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Selection);

		parent::tearDown();
	}

}
