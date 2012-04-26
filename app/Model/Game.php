<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property Tournament $Tournament
 * @property User $User
 */
class Game extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'We already have a game named like that',
			),
		),
		'thumbnail' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tournament' => array(
			'className' => 'Tournament',
			'joinTable' => 'games_tournaments',
			'foreignKey' => 'games_id',
			'associationForeignKey' => 'tournaments_id',
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
		'User' => array(
			'className' => 'User',
			'joinTable' => 'games_users',
			'foreignKey' => 'games_id',
			'associationForeignKey' => 'users_id',
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

/**
 * Retornamos el path explicito de donde almacenaremos las imagenes
 *
 * @param none
 * @return String El path a la carpeta de alamacenamiento
 */
	public function getStorageDir(){
		return ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'uploads' . DS . 'games' . DS;
	}

}
