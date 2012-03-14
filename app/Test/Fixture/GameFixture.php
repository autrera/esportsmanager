<?php
/* Game Fixture generated on: 2012-03-14 01:12:33 : 1331683953 */

/**
 * GameFixture
 *
 */
class GameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'gamescol' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'thumbnail' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
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
			'gamescol' => 'Lorem ipsum dolor sit amet',
			'thumbnail' => 'Lorem ipsum dolor sit amet'
		),
	);
}
