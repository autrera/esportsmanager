<?php
App::uses('AppModel', 'Model');
/**
 * Avatar Model
 *
 * @property Games $Games
 */
class Avatar extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'games_id' => array(
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
		'Games' => array(
			'className' => 'Games',
			'foreignKey' => 'games_id',
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
			$newData  = array();	
			$games_id = $data['Avatar']['games_id'];
			foreach ($data['Avatar'] as $key => $avatar){
				if (is_numeric($key)){
					$newData[$key] = array($this->alias => $avatar);
					$newData[$key][$this->alias]['games_id'] = 
						$games_id;
				}
			}
			return $newData;
		}
	}

}
