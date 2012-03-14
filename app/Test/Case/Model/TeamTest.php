<?php
/* Team Test cases generated on: 2012-03-14 04:34:23 : 1331696063*/
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
	public $fixtures = array('app.team', 'app.games', 'app.group', 'app.tournaments', 'app.group_team', 'app.match', 'app.comment', 'app.matches_comment', 'app.matches_team', 'app.user', 'app.avatars', 'app.teams', 'app.flags', 'app.roles', 'app.game', 'app.tournament', 'app.countries', 'app.games_tournament', 'app.ments_place', 'app.teams_tournaments_place', 'app.sponsor', 'app.tournaments_sponsor', 'app.games_user', 'app.matches_user', 'app.tournaments_place');

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
