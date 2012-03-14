<?php
/* Item Test cases generated on: 2012-03-14 04:33:33 : 1331696013*/
App::uses('Item', 'Model');

/**
 * Item Test Case
 *
 */
class ItemTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.item', 'app.category', 'app.categories_item', 'app.order', 'app.users', 'app.items_order');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Item = ClassRegistry::init('Item');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Item);

		parent::tearDown();
	}

}
