<?php
/* Follower Fixture generated on: 2012-03-14 01:12:31 : 1331683951 */

/**
 * FollowerFixture
 *
 */
class FollowerFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'profiles_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 12, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_followers_users1' => array('column' => 'users_id', 'unique' => 0), 'fk_followers_profiles1' => array('column' => 'profiles_id', 'unique' => 0)),
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
			'users_id' => 1,
			'profiles_id' => 1
		),
	);
}
