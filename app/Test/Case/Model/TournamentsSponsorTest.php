<?php
/* TournamentsSponsor Test cases generated on: 2012-03-14 01:13:05 : 1331683985*/
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
