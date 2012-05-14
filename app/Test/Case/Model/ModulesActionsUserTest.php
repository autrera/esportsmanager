<?php
/* ModulesActionsUser Test cases generated on: 2012-04-30 17:15:33 : 1335798933*/
App::uses('ModulesActionsUser', 'Model');

/**
 * ModulesActionsUser Test Case
 *
 */
class ModulesActionsUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.modules_actions_user', 'app.modules', 'app.actions', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ModulesActionsUser = ClassRegistry::init('ModulesActionsUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModulesActionsUser);

		parent::tearDown();
	}

}
