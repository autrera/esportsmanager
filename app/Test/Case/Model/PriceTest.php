<?php
/* Price Test cases generated on: 2012-03-13 19:09:36 : 1331662176*/
App::uses('Price', 'Model');

/**
 * Price Test Case
 *
 */
class PriceTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.price', 'app.tournaments');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Price = ClassRegistry::init('Price');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Price);

		parent::tearDown();
	}

}
