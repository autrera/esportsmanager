<?php
/* Day Test cases generated on: 2012-03-14 04:33:11 : 1331695991*/
App::uses('Day', 'Model');

/**
 * Day Test Case
 *
 */
class DayTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.day', 'app.tournaments');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Day = ClassRegistry::init('Day');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Day);

		parent::tearDown();
	}

}
