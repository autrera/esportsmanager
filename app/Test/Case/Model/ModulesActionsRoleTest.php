<?php
/* ModulesActionsRole Test cases generated on: 2012-04-30 17:03:46 : 1335798226*/
App::uses('ModulesActionsRole', 'Model');

/**
 * ModulesActionsRole Test Case
 *
 */
class ModulesActionsRoleTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.modules_actions_role', 'app.modules', 'app.actions', 'app.roles');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ModulesActionsRole = ClassRegistry::init('ModulesActionsRole');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ModulesActionsRole);

		parent::tearDown();
	}

}
