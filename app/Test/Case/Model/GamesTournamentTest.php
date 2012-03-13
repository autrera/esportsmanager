<?php
/* GamesTournament Test cases generated on: 2012-03-13 19:09:18 : 1331662158*/
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
