<?php
/* Match Test cases generated on: 2012-03-14 04:33:37 : 1331696017*/
App::uses('Match', 'Model');

/**
 * Match Test Case
 *
 */
class MatchTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.match', 'app.tournaments', 'app.comment', 'app.matches_comment', 'app.team', 'app.games', 'app.group', 'app.group_team', 'app.matches_team', 'app.tournaments_place', 'app.teams_tournaments_place', 'app.user', 'app.avatars', 'app.teams', 'app.flags', 'app.roles', 'app.game', 'app.tournament', 'app.countries', 'app.games_tournament', 'app.ments_place', 'app.sponsor', 'app.tournaments_sponsor', 'app.games_user', 'app.matches_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Match = ClassRegistry::init('Match');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Match);

		parent::tearDown();
	}

}
