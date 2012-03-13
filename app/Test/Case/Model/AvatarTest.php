<?php
/* Avatar Test cases generated on: 2012-03-13 19:09:09 : 1331662149*/
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
	public $fixtures = array('app.avatar', 'app.games', 'app.profile');

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
