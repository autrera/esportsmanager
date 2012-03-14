<?php
/* Avatar Test cases generated on: 2012-03-14 04:33:03 : 1331695983*/
App::uses('Avatar', 'Model');

/**
 * Avatar Test Case
 *
 */
class AvatarTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.avatar', 'app.games');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Avatar = ClassRegistry::init('Avatar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Avatar);

		parent::tearDown();
	}

}
