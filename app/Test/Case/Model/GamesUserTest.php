<?php
/* GamesUser Test cases generated on: 2012-03-13 19:09:19 : 1331662159*/
App::uses('GamesUser', 'Model');

/**
 * GamesUser Test Case
 *
 */
class GamesUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.games_user', 'app.games', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->GamesUser = ClassRegistry::init('GamesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->GamesUser);

		parent::tearDown();
	}

}
