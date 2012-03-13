<?php
/* Setting Test cases generated on: 2012-03-13 19:09:42 : 1331662182*/
App::uses('Setting', 'Model');

/**
 * Setting Test Case
 *
 */
class SettingTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.setting', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Setting = ClassRegistry::init('Setting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Setting);

		parent::tearDown();
	}

}
