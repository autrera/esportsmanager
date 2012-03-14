<?php
/* MatchesUser Test cases generated on: 2012-03-14 04:33:43 : 1331696023*/
App::uses('MatchesUser', 'Model');

/**
 * MatchesUser Test Case
 *
 */
class MatchesUserTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.matches_user', 'app.matches', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MatchesUser = ClassRegistry::init('MatchesUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MatchesUser);

		parent::tearDown();
	}

}
