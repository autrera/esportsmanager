<?php
/* CategoriesItem Test cases generated on: 2012-03-14 04:33:06 : 1331695986*/
App::uses('CategoriesItem', 'Model');

/**
 * CategoriesItem Test Case
 *
 */
class CategoriesItemTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.categories_item', 'app.items', 'app.categories');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->CategoriesItem = ClassRegistry::init('CategoriesItem');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesItem);

		parent::tearDown();
	}

}
