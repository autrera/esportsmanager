<?php
/* TournamentsSponsor Test cases generated on: 2012-03-13 19:09:49 : 1331662189*/
App::uses('TournamentsSponsor', 'Model');

/**
 * TournamentsSponsor Test Case
 *
 */
class TournamentsSponsorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tournaments_sponsor', 'app.sponsors', 'app.tournaments');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->TournamentsSponsor = ClassRegistry::init('TournamentsSponsor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TournamentsSponsor);

		parent::tearDown();
	}

}
