<?php
/* Match Fixture generated on: 2012-03-13 19:09:25 : 1331662165 */

/**
 * MatchFixture
 *
 */
class MatchFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 80, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'home_score' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'visit_score' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'charset' => 'latin1'),
		'created' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'collate' => NULL, 'comment' => ''),
		'tournaments_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_matches_tournaments1' => array('column' => 'tournaments_id', 'unique' => 0)),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'home_score' => 'Lorem ipsum dolor sit amet',
			'visit_score' => 'Lorem ipsum dolor sit amet',
			'created' => 1331662165,
			'tournaments_id' => 1
		),
	);
}
