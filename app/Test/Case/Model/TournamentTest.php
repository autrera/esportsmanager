<?php
/* Tournament Test cases generated on: 2012-03-14 04:34:26 : 1331696066*/
App::uses('Tournament', 'Model');

/**
 * Tournament Test Case
 *
 */
class TournamentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tournament', 'app.countries', 'app.game', 'app.games_tournament', 'app.user', 'app.avatars', 'app.teams', 'app.flags', 'app.roles', 'app.games_user', 'app.match', 'app.tournaments', 'app.comment', 'app.matches_comment', 'app.team', 'app.games', 'app.group', 'app.group_team', 'app.matches_team', 'app.tournaments_place', 'app.teams_tournaments_place', 'app.matches_user', 'app.ments_place', 'app.sponsor', 'app.tournaments_sponsor');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Tournament = ClassRegistry::init('Tournament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tournament);

		parent::tearDown();
	}

}
