<?php
/* ItemImage Test cases generated on: 2012-03-13 19:09:22 : 1331662162*/
App::uses('ItemImage', 'Model');

/**
 * ItemImage Test Case
 *
 */
class ItemImageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.item_image', 'app.items');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ItemImage = ClassRegistry::init('ItemImage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemImage);

		parent::tearDown();
	}

}
