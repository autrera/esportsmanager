<?php
/* Feature Test cases generated on: 2012-03-13 19:09:13 : 1331662153*/
App::uses('Feature', 'Model');

/**
 * Feature Test Case
 *
 */
class FeatureTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.feature', 'app.prices');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Feature = ClassRegistry::init('Feature');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Feature);

		parent::tearDown();
	}

}
