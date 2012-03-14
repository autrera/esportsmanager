<?php
App::uses('AppModel', 'Model');
/**
 * TeamsTournamentsPlace Model
 *
 * @property Teams $Teams
 * @property Tournaments $Tournaments
 * @property Places $Places
 */
class TeamsTournamentsPlace extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'places_id' => array(
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
		'Teams' => array(
			'className' => 'Teams',
			'foreignKey' => 'teams_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tournaments' => array(
			'className' => 'Tournaments',
			'foreignKey' => 'tournaments_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Places' => array(
			'className' => 'Places',
			'foreignKey' => 'places_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
