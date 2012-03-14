<?php
App::uses('AppModel', 'Model');
/**
 * ItemsOrder Model
 *
 * @property Items $Items
 * @property Orders $Orders
 */
class ItemsOrder extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'items_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'orders_id' => array(
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
		'Items' => array(
			'className' => 'Items',
			'foreignKey' => 'items_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Orders' => array(
			'className' => 'Orders',
			'foreignKey' => 'orders_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
