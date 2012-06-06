<?php
App::uses('AppModel', 'Model');
/**
 * StreamsUser Model
 *
 * @property Users $Users
 * @property Streams $Streams
 * @property Games $Games
 */
class StreamsUser extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'identifier';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'identifier' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'uniquecombo' => array(
				'rule' =>'uniqueauth',
				'message' => 'This account has already been authorized'
			),
		),
		'streams_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Only numbers are allowed on this field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Only numbers are allowed on this field',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'access_key' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'access_secret' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'This field can\'t be empty',
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
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Streams' => array(
			'className' => 'Streams',
			'foreignKey' => 'streams_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Games' => array(
			'className' => 'Games',
			'foreignKey' => 'games_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Verificamos que el recurso sea único
 *
 * @param none
 * @return void
 */
    public function uniqueauth() {
    	// Buscamos si el usuario ya dió de alta esta cuenta antes
        $dato = $this->field('identifier', array(
            'StreamsUser.identifier' 
            	=> $this->data['StreamsUser']['identifier'],
            'StreamsUser.streams_id' 
	            => $this->data['StreamsUser']['streams_id'],
        ));

    	if (!empty($dato)){
    		return false;
    	} else {
    		return true;
    	}
    }

}
