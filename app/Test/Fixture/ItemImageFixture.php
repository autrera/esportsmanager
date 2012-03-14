<?php
/* ItemImage Fixture generated on: 2012-03-14 04:33:30 : 1331696010 */

/**
 * ItemImageFixture
 *
 */
class ItemImageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 80, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'collate' => NULL, 'comment' => ''),
		'items_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_item_images_items1' => array('column' => 'items_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet',
			'order' => 1,
			'items_id' => 1
		),
	);
}
