<?php
/* Video Test cases generated on: 2012-03-13 19:09:51 : 1331662191*/
App::uses('Video', 'Model');

/**
 * Video Test Case
 *
 */
class VideoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Video = ClassRegistry::init('Video');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Video);

		parent::tearDown();
	}

}
