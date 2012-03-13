<?php
App::uses('AppModel', 'Model');
/**
 * Day Model
 *
 * @property Tournaments $Tournaments
 */
class Day extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'day' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tournaments_id' => array(
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
		'Tournaments' => array(
			'className' => 'Tournaments',
			'foreignKey' => 'tournaments_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
