<?php
/* Flag Test cases generated on: 2012-03-14 04:33:14 : 1331695994*/
App::uses('Flag', 'Model');

/**
 * Flag Test Case
 *
 */
class FlagTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.flag');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Flag = ClassRegistry::init('Flag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Flag);

		parent::tearDown();
	}

}
