<?php
/* ItemImage Test cases generated on: 2012-03-14 04:33:30 : 1331696010*/
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
