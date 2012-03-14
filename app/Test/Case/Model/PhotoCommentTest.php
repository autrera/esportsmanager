<?php
/* PhotoComment Test cases generated on: 2012-03-14 04:33:52 : 1331696032*/
App::uses('PhotoComment', 'Model');

/**
 * PhotoComment Test Case
 *
 */
class PhotoCommentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.photo_comment', 'app.photos', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PhotoComment = ClassRegistry::init('PhotoComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PhotoComment);

		parent::tearDown();
	}

}
