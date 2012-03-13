<?php
/* Team Test cases generated on: 2012-03-13 19:09:46 : 1331662186*/
App::uses('Team', 'Model');

/**
 * Team Test Case
 *
 */
class TeamTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.team', 'app.games', 'app.group', 'app.tournaments', 'app.group_team', 'app.match', 'app.comment', 'app.matches_comment', 'app.matches_team', 'app.user', 'app.matches_user', 'app.tournaments_place', 'app.teams_tournaments_place');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Team = ClassRegistry::init('Team');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Team);

		parent::tearDown();
	}

}
