<?php
/* GroupTeam Test cases generated on: 2012-03-14 04:33:26 : 1331696006*/
App::uses('GroupTeam', 'Model');

/**
 * GroupTeam Test Case
 *
 */
class GroupTeamTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.group_team', 'app.groups', 'app.flags');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->GroupTeam = ClassRegistry::init('GroupTeam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GroupTeam);

		parent::tearDown();
	}

}
