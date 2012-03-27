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
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
			'foreignKey' => 'game_id',
			'associationForeignKey' => 'tournament_id',
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
			'foreignKey' => 'game_id',
			'associationForeignKey' => 'user_id',
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
 * Verifica que el archivo haya sido subido exitosamente
 *
 * @param array El array que forma el html helper del archivo subido
 * @return boolean true, si fue exitoso. Falso si no se subió el archivo
 */
	public function isUploadedFile($params) {
	    if ((isset($params['error']) && $params['error'] == 0) ||
	        (!empty( $params['tmp_name']) && $params['tmp_name'] != 'none')
	    ) {
	        return is_uploaded_file($params['tmp_name']);
	    }
	    return false;
	}

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
