<?php
/* Tournament Test cases generated on: 2012-03-13 19:09:48 : 1331662188*/
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
	public $fixtures = array('app.tournament', 'app.countries', 'app.game', 'app.games_tournament', 'app.user', 'app.games_user', 'app.ments_place', 'app.teams_tournaments_place', 'app.sponsor', 'app.tournaments_sponsor');

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
