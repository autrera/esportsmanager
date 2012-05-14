<?php
/* StreamsUser Fixture generated on: 2012-04-25 17:40:31 : 1335368431 */

/**
 * StreamsUserFixture
 *
 */
class StreamsUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'service_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'streams_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'games_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_streams_users1' => array('column' => 'users_id', 'unique' => 0), 'fk_streams_users_streams1' => array('column' => 'streams_id', 'unique' => 0), 'fk_streams_users_games1' => array('column' => 'games_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'service_id' => 1,
			'users_id' => 1,
			'streams_id' => 1,
			'games_id' => 1
		),
	);
}
