<?php
App::uses('ReminderType', 'Model');

/**
 * ReminderType Test Case
 */
class ReminderTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reminder_type',
		'app.reminder'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ReminderType = ClassRegistry::init('ReminderType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ReminderType);

		parent::tearDown();
	}

}
