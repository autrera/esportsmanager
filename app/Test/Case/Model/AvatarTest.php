<?php
/* Avatar Test cases generated on: 2012-03-14 01:12:24 : 1331683944*/
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
	public $fixtures = array('app.avatar', 'app.games', 'app.profile', 'app.nation', 'app.users');

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
