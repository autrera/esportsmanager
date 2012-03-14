<?php
/* Follower Test cases generated on: 2012-03-14 04:33:17 : 1331695997*/
App::uses('Follower', 'Model');

/**
 * Follower Test Case
 *
 */
class FollowerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.follower', 'app.users', 'app.profiles');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Follower = ClassRegistry::init('Follower');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Follower);

		parent::tearDown();
	}

}
