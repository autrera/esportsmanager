<?php
/* Prize Test cases generated on: 2012-03-14 04:34:04 : 1331696044*/
App::uses('Prize', 'Model');

/**
 * Prize Test Case
 *
 */
class PrizeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.prize', 'app.places', 'app.tournaments');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Prize = ClassRegistry::init('Prize');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prize);

		parent::tearDown();
	}

}
