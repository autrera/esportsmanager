<?php
/* Schedule Test cases generated on: 2012-03-13 19:09:41 : 1331662181*/
App::uses('Schedule', 'Model');

/**
 * Schedule Test Case
 *
 */
class ScheduleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.schedule', 'app.days');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Schedule = ClassRegistry::init('Schedule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Schedule);

		parent::tearDown();
	}

}
