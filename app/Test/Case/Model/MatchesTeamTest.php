<?php
/* MatchesTeam Test cases generated on: 2012-03-13 19:09:27 : 1331662167*/
App::uses('MatchesTeam', 'Model');

/**
 * MatchesTeam Test Case
 *
 */
class MatchesTeamTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.matches_team', 'app.matches', 'app.teams');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MatchesTeam = ClassRegistry::init('MatchesTeam');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MatchesTeam);

		parent::tearDown();
	}

}
