<?php
/* Country Test cases generated on: 2012-03-14 01:12:27 : 1331683947*/
App::uses('Country', 'Model');

/**
 * Country Test Case
 *
 */
class CountryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.country');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Country = ClassRegistry::init('Country');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Country);

		parent::tearDown();
	}

}
