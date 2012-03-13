<?php
/* Match Test cases generated on: 2012-03-13 19:09:25 : 1331662165*/
App::uses('Match', 'Model');

/**
 * Match Test Case
 *
 */
class MatchTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.match', 'app.tournaments', 'app.comment', 'app.matches_comment', 'app.team', 'app.matches_team', 'app.user', 'app.matches_user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Match = ClassRegistry::init('Match');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Match);

		parent::tearDown();
	}

}
