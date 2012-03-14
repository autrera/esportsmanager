<?php
/* Game Test cases generated on: 2012-03-14 01:12:33 : 1331683953*/
App::uses('Game', 'Model');

/**
 * Game Test Case
 *
 */
class GameTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.game', 'app.tournament', 'app.countries', 'app.games_tournament', 'app.ments_place', 'app.teams_tournaments_place', 'app.sponsor', 'app.tournaments_sponsor', 'app.user', 'app.avatars', 'app.teams', 'app.flags', 'app.roles', 'app.games_user', 'app.match', 'app.tournaments', 'app.comment', 'app.matches_comment', 'app.team', 'app.games', 'app.group', 'app.group_team', 'app.matches_team', 'app.tournaments_place', 'app.matches_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Game = ClassRegistry::init('Game');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Game);

		parent::tearDown();
	}

}
