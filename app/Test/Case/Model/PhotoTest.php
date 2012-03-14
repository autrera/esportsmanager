<?php
/* Photo Test cases generated on: 2012-03-14 04:33:54 : 1331696034*/
App::uses('Photo', 'Model');

/**
 * Photo Test Case
 *
 */
class PhotoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.photo', 'app.galleries', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Photo = ClassRegistry::init('Photo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Photo);

		parent::tearDown();
	}

}
