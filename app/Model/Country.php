<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 */
class Country extends AppModel {
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
	);

/**
 * Retornamos el path explicito de donde almacenaremos las imagenes
 *
 * @param none
 * @return String El path a la carpeta de alamacenamiento
 */
	public function getStorageDir(){
		return ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'uploads' . DS . 'flags' . DS;
	}

}
