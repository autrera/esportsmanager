<?php
/* TeamsTournamentsPlace Fixture generated on: 2012-03-14 04:34:25 : 1331696065 */

/**
 * TeamsTournamentsPlaceFixture
 *
 */
class TeamsTournamentsPlaceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'teams_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tournaments_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'places_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_teams_tournaments_places_teams1' => array('column' => 'teams_id', 'unique' => 0), 'fk_teams_tournaments_places_tournaments1' => array('column' => 'tournaments_id', 'unique' => 0), 'fk_teams_tournaments_places_places1' => array('column' => 'places_id', 'unique' => 0)),
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
			'teams_id' => 1,
			'tournaments_id' => 1,
			'places_id' => 1
		),
	);
}
