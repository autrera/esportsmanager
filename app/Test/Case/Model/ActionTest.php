<?php
/* Action Test cases generated on: 2012-04-30 17:01:29 : 1335798089*/
App::uses('Action', 'Model');

/**
 * Action Test Case
 *
 */
class ActionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.action', 'app.actions_role', 'app.modules_actions_role', 'app.actions_user', 'app.modules_actions_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Action = ClassRegistry::init('Action');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Action);

		parent::tearDown();
	}

}
