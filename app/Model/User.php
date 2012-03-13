<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Avatars $Avatars
 * @property Teams $Teams
 * @property Flags $Flags
 * @property Roles $Roles
 * @property Game $Game
 * @property Match $Match
 */
class User extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'valid' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'avatars_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'teams_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'flags_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roles_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Avatars' => array(
			'className' => 'Avatars',
			'foreignKey' => 'avatars_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Teams' => array(
			'className' => 'Teams',
			'foreignKey' => 'teams_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Flags' => array(
			'className' => 'Flags',
			'foreignKey' => 'flags_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Roles' => array(
			'className' => 'Roles',
			'foreignKey' => 'roles_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Game' => array(
			'className' => 'Game',
			'joinTable' => 'games_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'game_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Match' => array(
			'className' => 'Match',
			'joinTable' => 'matches_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'match_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
