<?php
App::uses('AppModel', 'Model');
/**
 * Photo Model
 *
 * @property Galleries $Galleries
 * @property Users $Users
 */
class Photo extends AppModel {
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
		),
		'url' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'galleries_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'users_id' => array(
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
		'Galleries' => array(
			'className' => 'Galleries',
			'foreignKey' => 'galleries_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Vamos a formar varios mini request data y meterlos dentro de otro array
 * así podemos ciclar el proceso por cada archivo y guardar un archivo a la vez
 * Podriamos llamar al método saveMany, pero no creo que sea lo mas conveniente
 *
 * @param array data El request data enviado del form
 * @return array newData El multi request data para ciclar el guardado
 */
	public function formatearMultiUpload($data){
		if (! empty($data)){
			$newData = array();	
			foreach ($data['Photo'] as $key => $photo){
				$newData[$key] = array($this->alias => $photo);
				$newData[$key][$this->alias]['users_id'] = 
					$data['users_id'];
				$newData[$key][$this->alias]['galleries_id'] = 
					$data['galleries_id'];
			}
			return $newData;
		}
	}

/**
 * Retornamos el path explicito de donde almacenaremos las imagenes
 *
 * @param none
 * @return String El path a la carpeta de alamacenamiento
 */
	public function getStorageDir(){
		return ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'uploads' . DS . 'photos' . DS;
	}

}
