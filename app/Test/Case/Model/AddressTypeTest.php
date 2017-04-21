<?php
App::uses('AddressType', 'Model');

/**
 * AddressType Test Case
 */
class AddressTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.address_type',
		'app.address'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AddressType = ClassRegistry::init('AddressType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AddressType);

		parent::tearDown();
	}

}
