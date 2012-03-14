<?php
App::uses('AppModel', 'Model');
/**
 * Place Model
 *
 * @property TeamsTournament $TeamsTournament
 */
class Place extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'place' => array(
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
		'TeamsTournament' => array(
			'className' => 'TeamsTournament',
			'joinTable' => 'teams_tournaments_places',
			'foreignKey' => 'place_id',
			'associationForeignKey' => 'teams_tournament_id',
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

}
