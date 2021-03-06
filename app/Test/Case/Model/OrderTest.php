<?php
/* Order Test cases generated on: 2012-03-14 04:33:49 : 1331696029*/
App::uses('Order', 'Model');

/**
 * Order Test Case
 *
 */
class OrderTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.order', 'app.users', 'app.item', 'app.category', 'app.categories_item', 'app.items_order');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Order = ClassRegistry::init('Order');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Order);

		parent::tearDown();
	}

}
