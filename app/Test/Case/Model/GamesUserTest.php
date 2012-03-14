<?php
/* GamesUser Test cases generated on: 2012-03-14 04:33:25 : 1331696005*/
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
