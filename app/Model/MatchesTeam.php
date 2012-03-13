<?php
App::uses('AppModel', 'Model');
/**
 * MatchesTeam Model
 *
 * @property Matches $Matches
 * @property Teams $Teams
 */
class MatchesTeam extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'matches_id' => array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Matches' => array(
			'className' => 'Matches',
			'foreignKey' => 'matches_id',
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
		)
	);
}
