<?php
App::uses('User', 'Model');

/**
 * User Test Case
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.order',
		'app.company',
		'app.travel_date',
		'app.travel_date_type',
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
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
