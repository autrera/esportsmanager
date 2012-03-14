<?php
/* Profile Test cases generated on: 2012-03-14 04:34:06 : 1331696046*/
App::uses('Profile', 'Model');

/**
 * Profile Test Case
 *
 */
class ProfileTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.profile', 'app.users', 'app.countries');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Profile = ClassRegistry::init('Profile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Profile);

		parent::tearDown();
	}

}
