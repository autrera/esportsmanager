<?php
/* Setting Fixture generated on: 2012-03-13 19:09:42 : 1331662182 */

/**
 * SettingFixture
 *
 */
class SettingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'game_sensitive' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '4,2', 'collate' => NULL, 'comment' => ''),
		'os_sensitive' => array('type' => 'boolean', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'x_resolution' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => NULL, 'comment' => ''),
		'y_resolution' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => NULL, 'comment' => ''),
		'rate' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => NULL, 'comment' => ''),
		'dpi' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => NULL, 'comment' => ''),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_settings_users1' => array('column' => 'users_id', 'unique' => 0)),
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
			'game_sensitive' => 1,
			'os_sensitive' => 1,
			'x_resolution' => 1,
			'y_resolution' => 1,
			'rate' => 1,
			'dpi' => 1,
			'users_id' => 1
		),
	);
}
