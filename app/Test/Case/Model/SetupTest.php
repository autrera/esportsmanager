<?php
/* Setup Test cases generated on: 2012-03-14 01:13:00 : 1331683980*/
App::uses('Setup', 'Model');

/**
 * Setup Test Case
 *
 */
class SetupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.setup', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Setup = ClassRegistry::init('Setup');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Setup);

		parent::tearDown();
	}

}
