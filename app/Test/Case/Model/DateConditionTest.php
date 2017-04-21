<?php
App::uses('DateCondition', 'Model');

/**
 * DateCondition Test Case
 */
class DateConditionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.date_condition',
		'app.houses_travel_date'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DateCondition = ClassRegistry::init('DateCondition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DateCondition);

		parent::tearDown();
	}

}
