<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Teams $Teams
 * @property Roles $Roles
 * @property Game $Game
 * @property Match $Match
 */
class User extends AppModel {
/** 
 * Display field *
 * @var string
 */
	public $displayField = 'nickname';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nickname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your nickname',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email address.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email already taken. Please choose another one.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'passwordequal' => array(
				'rule' =>'checkpasswords',
				'message' => 'Passwords muest be equal'
			),
		),
		'password_check' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'passwordequal' => array(
				'rule' =>'checkpasswords',
				'message' => 'Passwords muest be equal'
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Profile' => array(
			'className' => 'Profile',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Teams' => array(
			'className' => 'Teams',
			'foreignKey' => 'teams_id',
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
	// public $hasAndBelongsToMany = array(
	// 	'Game' => array(
	// 		'className' => 'Game',
	// 		'joinTable' => 'games_users',
	// 		'foreignKey' => 'user_id',
	// 		'associationForeignKey' => 'game_id',
	// 		'unique' => true,
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'limit' => '',
	// 		'offset' => '',
	// 		'finderQuery' => '',
	// 		'deleteQuery' => '',
	// 		'insertQuery' => ''
	// 	),
	// 	'Match' => array(
	// 		'className' => 'Match',
	// 		'joinTable' => 'matches_users',
	// 		'foreignKey' => 'user_id',
	// 		'associationForeignKey' => 'match_id',
	// 		'unique' => true,
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'limit' => '',
	// 		'offset' => '',
	// 		'finderQuery' => '',
	// 		'deleteQuery' => '',
	// 		'insertQuery' => ''
	// 	)
	// );

	public function beforeSave() {
		parent::beforeSave();
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}

	public function checkpasswords(){
		return ($this->data['User']['password'] == $this->data['User']['password_check']);
	}

}
