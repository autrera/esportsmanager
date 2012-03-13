<?php
/* GroupTeam Test cases generated on: 2012-03-13 19:09:20 : 1331662160*/
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
