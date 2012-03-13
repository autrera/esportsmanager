<?php
/* TournamentsSponsor Fixture generated on: 2012-03-13 19:09:49 : 1331662189 */

/**
 * TournamentsSponsorFixture
 *
 */
class TournamentsSponsorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'sponsors_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'tournaments_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_tournaments_sponsors_sponsors1' => array('column' => 'sponsors_id', 'unique' => 0), 'fk_tournaments_sponsors_tournaments1' => array('column' => 'tournaments_id', 'unique' => 0)),
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
			'sponsors_id' => 1,
			'tournaments_id' => 1
		),
	);
}
