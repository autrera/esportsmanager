<?php
/* TeamsTournamentsPlace Test cases generated on: 2012-03-14 04:34:25 : 1331696065*/
App::uses('TeamsTournamentsPlace', 'Model');

/**
 * TeamsTournamentsPlace Test Case
 *
 */
class TeamsTournamentsPlaceTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.teams_tournaments_place', 'app.teams', 'app.tournaments', 'app.places');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->TeamsTournamentsPlace = ClassRegistry::init('TeamsTournamentsPlace');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeamsTournamentsPlace);

		parent::tearDown();
	}

}
