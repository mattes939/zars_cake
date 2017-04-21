<?php
App::uses('PropertyType', 'Model');

/**
 * PropertyType Test Case
 */
class PropertyTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.property_type',
		'app.property',
		'app.selection',
		'app.value'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PropertyType = ClassRegistry::init('PropertyType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PropertyType);

		parent::tearDown();
	}

}
