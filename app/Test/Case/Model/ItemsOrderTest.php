<?php
/* ItemsOrder Test cases generated on: 2012-03-13 19:09:24 : 1331662164*/
App::uses('ItemsOrder', 'Model');

/**
 * ItemsOrder Test Case
 *
 */
class ItemsOrderTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.items_order', 'app.items', 'app.orders');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->ItemsOrder = ClassRegistry::init('ItemsOrder');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ItemsOrder);

		parent::tearDown();
	}

}
