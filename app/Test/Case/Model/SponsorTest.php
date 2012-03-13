<?php
/* Sponsor Test cases generated on: 2012-03-13 19:09:44 : 1331662184*/
App::uses('Sponsor', 'Model');

/**
 * Sponsor Test Case
 *
 */
class SponsorTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sponsor', 'app.tournament', 'app.tournaments_sponsor');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Sponsor = ClassRegistry::init('Sponsor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sponsor);

		parent::tearDown();
	}

}
