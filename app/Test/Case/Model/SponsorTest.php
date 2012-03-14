<?php
/* Sponsor Test cases generated on: 2012-03-14 04:34:19 : 1331696059*/
App::uses('Sponsor', 'Model');

/**
 * Sponsor Test Case
 *
 */
class SponsorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sponsor', 'app.tournament', 'app.countries', 'app.game', 'app.games_tournament', 'app.user', 'app.avatars', 'app.teams', 'app.flags', 'app.roles', 'app.games_user', 'app.match', 'app.tournaments', 'app.comment', 'app.matches_comment', 'app.team', 'app.games', 'app.group', 'app.group_team', 'app.matches_team', 'app.tournaments_place', 'app.teams_tournaments_place', 'app.matches_user', 'app.ments_place', 'app.tournaments_sponsor');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Sponsor = ClassRegistry::init('Sponsor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sponsor);

		parent::tearDown();
	}

}
