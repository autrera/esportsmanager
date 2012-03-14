<?php
/* Profile Fixture generated on: 2012-03-14 01:12:55 : 1331683975 */

/**
 * ProfileFixture
 *
 */
class ProfileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'avatar_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'collate' => NULL, 'comment' => ''),
		'nation_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'collate' => NULL, 'comment' => ''),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'nickname' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'birthdate' => array('type' => 'date', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 300, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'picture' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 80, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'gender' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_profiles_users1' => array('column' => 'users_id', 'unique' => 0)),
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
			'avatar_id' => 1,
			'nation_id' => 1,
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'nickname' => 'Lorem ipsum dolor sit amet',
			'birthdate' => '2012-03-14',
			'description' => 'Lorem ipsum dolor sit amet',
			'picture' => 'Lorem ipsum dolor sit amet',
			'gender' => 'Lorem ipsum dolor sit amet',
			'users_id' => 1
		),
	);
}
