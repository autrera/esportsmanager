<?php
/* Game Test cases generated on: 2012-03-13 19:09:17 : 1331662157*/
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
	public $fixtures = array('app.game', 'app.tournament', 'app.games_tournament', 'app.user', 'app.games_user');

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
