<?php
/* NewsComment Test cases generated on: 2012-03-13 19:09:29 : 1331662169*/
App::uses('NewsComment', 'Model');

/**
 * NewsComment Test Case
 *
 */
class NewsCommentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.news_comment', 'app.news', 'app.users', 'app.comment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->NewsComment = ClassRegistry::init('NewsComment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NewsComment);

		parent::tearDown();
	}

}
