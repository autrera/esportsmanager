<?php
/* GamesTournament Test cases generated on: 2012-03-14 01:12:34 : 1331683954*/
App::uses('GamesTournament', 'Model');

/**
 * GamesTournament Test Case
 *
 */
class GamesTournamentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.games_tournament', 'app.games', 'app.tournaments');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->GamesTournament = ClassRegistry::init('GamesTournament');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GamesTournament);

		parent::tearDown();
	}

}
