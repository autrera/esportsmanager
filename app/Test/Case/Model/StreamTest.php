<?php
/* Stream Test cases generated on: 2012-03-14 04:34:21 : 1331696061*/
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
