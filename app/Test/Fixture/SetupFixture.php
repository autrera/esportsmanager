<?php
/* Setup Fixture generated on: 2012-03-14 04:34:17 : 1331696057 */

/**
 * SetupFixture
 *
 */
class SetupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'mouse' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 60, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'keyboard' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 60, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'mousepad' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 60, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'headphones' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'monitor' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'case' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'motherboard' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'memory' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'cpu' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'hdd' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'gpu' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'sound' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'os' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_setups_users1' => array('column' => 'users_id', 'unique' => 0)),
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
			'mouse' => 'Lorem ipsum dolor sit amet',
			'keyboard' => 'Lorem ipsum dolor sit amet',
			'mousepad' => 'Lorem ipsum dolor sit amet',
			'headphones' => 'Lorem ipsum dolor sit amet',
			'monitor' => 'Lorem ipsum dolor sit amet',
			'case' => 'Lorem ipsum dolor sit amet',
			'motherboard' => 'Lorem ipsum dolor sit amet',
			'memory' => 'Lorem ipsum dolor sit amet',
			'cpu' => 'Lorem ipsum dolor sit amet',
			'hdd' => 'Lorem ipsum dolor sit amet',
			'gpu' => 'Lorem ipsum dolor sit amet',
			'sound' => 'Lorem ipsum dolor sit amet',
			'os' => 'Lorem ipsum dolor sit amet',
			'users_id' => 1
		),
	);
}
