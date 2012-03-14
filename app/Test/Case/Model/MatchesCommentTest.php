<?php
/* MatchesComment Test cases generated on: 2012-03-14 01:12:42 : 1331683962*/
App::uses('MatchesComment', 'Model');

/**
 * MatchesComment Test Case
 *
 */
class MatchesCommentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.matches_comment', 'app.matches', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->MatchesComment = ClassRegistry::init('MatchesComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MatchesComment);

		parent::tearDown();
	}

}
