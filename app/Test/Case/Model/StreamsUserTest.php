<?php
/* StreamsUser Test cases generated on: 2012-04-25 17:40:31 : 1335368431*/
App::uses('StreamsUser', 'Model');

/**
 * StreamsUser Test Case
 *
 */
class StreamsUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.streams_user', 'app.users', 'app.streams', 'app.games');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->StreamsUser = ClassRegistry::init('StreamsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StreamsUser);

		parent::tearDown();
	}

}
