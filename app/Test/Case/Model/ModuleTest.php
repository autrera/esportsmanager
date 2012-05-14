<?php
/* Module Test cases generated on: 2012-04-30 17:02:13 : 1335798133*/
App::uses('Module', 'Model');

/**
 * Module Test Case
 *
 */
class ModuleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.module', 'app.actions_role', 'app.modules_actions_role', 'app.actions_user', 'app.modules_actions_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Module = ClassRegistry::init('Module');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Module);

		parent::tearDown();
	}

}
