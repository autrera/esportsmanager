<?php
/* VideoComment Test cases generated on: 2012-03-14 04:34:33 : 1331696073*/
App::uses('VideoComment', 'Model');

/**
 * VideoComment Test Case
 *
 */
class VideoCommentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.video_comment', 'app.videos', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->VideoComment = ClassRegistry::init('VideoComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->VideoComment);

		parent::tearDown();
	}

}
