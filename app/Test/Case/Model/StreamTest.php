<?php
/* Stream Test cases generated on: 2012-03-13 19:09:45 : 1331662185*/
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
	public $fixtures = array('app.stream', 'app.service', 'app.users');

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
