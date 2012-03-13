<?php
/* Group Test cases generated on: 2012-03-13 19:09:21 : 1331662161*/
App::uses('Group', 'Model');

/**
 * Group Test Case
 *
 */
class GroupTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.group', 'app.tournaments');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Group = ClassRegistry::init('Group');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Group);

		parent::tearDown();
	}

}
