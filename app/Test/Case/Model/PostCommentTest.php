<?php
/* PostComment Test cases generated on: 2012-03-13 19:09:34 : 1331662174*/
App::uses('PostComment', 'Model');

/**
 * PostComment Test Case
 *
 */
class PostCommentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.post_comment', 'app.posts', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->PostComment = ClassRegistry::init('PostComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PostComment);

		parent::tearDown();
	}

}
