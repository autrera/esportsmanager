<?php
/* News Test cases generated on: 2012-03-14 04:33:45 : 1331696025*/
App::uses('News', 'Model');

/**
 * News Test Case
 *
 */
class NewsTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.news', 'app.users', 'app.comment', 'app.news_comment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->News = ClassRegistry::init('News');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->News);

		parent::tearDown();
	}

}
