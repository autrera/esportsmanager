<?php
/* Role Test cases generated on: 2012-03-13 19:09:40 : 1331662180*/
App::uses('Role', 'Model');

/**
 * Role Test Case
 *
 */
class RoleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.role');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Role = ClassRegistry::init('Role');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Role);

		parent::tearDown();
	}

}
