<?php
App::uses('AppModel', 'Model');
/**
 * Module Model
 *
 * @property ActionsRole $ActionsRole
 * @property ActionsUser $ActionsUser
 */
class Module extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
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

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'ActionsRole' => array(
			'className' => 'ActionsRole',
			'joinTable' => 'modules_actions_roles',
			'foreignKey' => 'module_id',
			'associationForeignKey' => 'actions_role_id',
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
		'ActionsUser' => array(
			'className' => 'ActionsUser',
			'joinTable' => 'modules_actions_users',
			'foreignKey' => 'module_id',
			'associationForeignKey' => 'actions_user_id',
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
