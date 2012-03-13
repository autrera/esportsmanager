<?php
/* Gallery Test cases generated on: 2012-03-13 19:09:16 : 1331662156*/
App::uses('Gallery', 'Model');

/**
 * Gallery Test Case
 *
 */
class GalleryTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.gallery', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Gallery = ClassRegistry::init('Gallery');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gallery);

		parent::tearDown();
	}

}
