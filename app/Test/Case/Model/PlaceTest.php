<?php
/* Place Test cases generated on: 2012-03-14 04:33:56 : 1331696036*/
App::uses('Place', 'Model');

/**
 * Place Test Case
 *
 */
class PlaceTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.place', 'app.teams_tournament', 'app.teams_tournaments_place');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Place = ClassRegistry::init('Place');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Place);

		parent::tearDown();
	}

}
