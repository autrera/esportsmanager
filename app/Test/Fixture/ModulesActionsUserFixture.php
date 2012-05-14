<?php
/* ModulesActionsUser Fixture generated on: 2012-04-30 17:15:33 : 1335798933 */

/**
 * ModulesActionsUserFixture
 *
 */
class ModulesActionsUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'modules_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'actions_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index', 'collate' => NULL, 'comment' => ''),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_modules_actions_users_modules1' => array('column' => 'modules_id', 'unique' => 0), 'fk_modules_actions_users_actions1' => array('column' => 'actions_id', 'unique' => 0), 'fk_modules_actions_users_users1' => array('column' => 'users_id', 'unique' => 0)),
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
			'modules_id' => 1,
			'actions_id' => 1,
			'users_id' => 1
		),
	);
}
