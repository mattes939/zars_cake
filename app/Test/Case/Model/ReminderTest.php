<?php
App::uses('Reminder', 'Model');

/**
 * Reminder Test Case
 */
class ReminderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reminder',
		'app.reminder_type',
		'app.house',
		'app.user',
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
		'app.order',
		'app.company',
		'app.travel_date',
		'app.review',
		'app.special_offer',
		'app.value',
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
		$this->Reminder = ClassRegistry::init('Reminder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reminder);

		parent::tearDown();
	}

}
