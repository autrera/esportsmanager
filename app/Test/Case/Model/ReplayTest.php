<?php
/* Replay Test cases generated on: 2012-03-14 01:12:56 : 1331683976*/
App::uses('Replay', 'Model');

/**
 * Replay Test Case
 *
 */
class ReplayTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.replay', 'app.matches');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Replay = ClassRegistry::init('Replay');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Replay);

		parent::tearDown();
	}

}
