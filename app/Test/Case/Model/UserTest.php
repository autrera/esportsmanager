<?php
/* User Test cases generated on: 2012-03-14 01:13:06 : 1331683986*/
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user', 'app.avatars', 'app.teams', 'app.flags', 'app.roles', 'app.game', 'app.tournament', 'app.countries', 'app.games_tournament', 'app.ments_place', 'app.teams_tournaments_place', 'app.sponsor', 'app.tournaments_sponsor', 'app.games_user', 'app.match', 'app.tournaments', 'app.comment', 'app.matches_comment', 'app.team', 'app.games', 'app.group', 'app.group_team', 'app.matches_team', 'app.tournaments_place', 'app.matches_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
