<?php
App::uses('AppModel', 'Model');
/**
 * ModulesActionsRole Model
 *
 * @property Modules $Modules
 * @property Actions $Actions
 * @property Roles $Roles
 */
class ModulesActionsRole extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'modules_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'actions_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'roles_id' => array(
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
		'Modules' => array(
			'className' => 'Modules',
			'foreignKey' => 'modules_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Actions' => array(
			'className' => 'Actions',
			'foreignKey' => 'actions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Roles' => array(
			'className' => 'Roles',
			'foreignKey' => 'roles_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    // {{{ isRoleAllowed()

    /**
     * Validación por Roles
     *
     * Verificamos si el rol del usuario tiene permitida esta acción
     * si es asi, lo dejaremos continuar
     *
     * @param String    $role_id        El id del rol del usuario
     * @param String    $action_name    El nombre de la acción solicitada
     * @param String    $module_name    El nombre del modulo solicitado
     *
     * @return boolean  true, si el rol del usuario tiene permitido esta acción
     *                  en el módulo
     *                  false, de lo contrario
     */
    public function isRoleAllowed($role_id, $action_name, $module_name){

        // Hacemos la consulta
        $record = $this->find('first', array(
                'conditions' => array(
                    'roles_id' => $role_id,
                    'Action.name' => $action_name,
                    'Module.name' => $module_name,
                ),
                'joins' => array(
                    array(
                        'alias' => 'Action', 
                        'table' => 'actions',
                        'type' => 'LEFT',
                        'conditions' => '`Action`.`id` = `actions_id`'
                    ),
                    array(
                        'alias' => 'Module', 
                        'table' => 'modules',
                        'type' => 'LEFT',
                        'conditions' => '`Module`.`id` = `modules_id`'
                    )
                )
            )
        );

        if (! empty($record)){
            // El usuario tiene un rol que le permite realizar está acción
            return true;
        } else {
            return false;
        }

    }

    // }}}


}
