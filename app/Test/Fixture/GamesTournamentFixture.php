<?php
/* GamesTournament Fixture generated on: 2012-03-13 19:09:18 : 1331662158 */

/**
 * GamesTournamentFixture
 *
 */
class GamesTournamentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'games_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tournaments_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_games_tournaments_games1' => array('column' => 'games_id', 'unique' => 0), 'fk_games_tournaments_tournaments1' => array('column' => 'tournaments_id', 'unique' => 0)),
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
			'games_id' => 1,
			'tournaments_id' => 1
		),
	);
}
