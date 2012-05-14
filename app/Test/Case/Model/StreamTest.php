<?php
/* Stream Test cases generated on: 2012-04-25 17:37:49 : 1335368269*/
App::uses('Stream', 'Model');

/**
 * Stream Test Case
 *
 */
class StreamTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.stream', 'app.user', 'app.teams', 'app.roles', 'app.profile', 'app.users', 'app.countries', 'app.avatars', 'app.streams_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Stream = ClassRegistry::init('Stream');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Stream);

		parent::tearDown();
	}

}
