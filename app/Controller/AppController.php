<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 */
class AppController extends Controller {

    // Los componentes que usaremos en todos los controladores
    public $components = array(
        'AutoLogin',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'home',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'home',
                'action' => 'index'
            ),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'authorize' => array(
                'Controller'
            )
        ),
        'RequestHandler',
    );

    // Le permitimos a todos ver el listado y un elemento en particular
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
        $this->set('authUser', $this->Auth->user());
    }

/**
 * Autorizamos a los administradores y denegamos acceso a todos los
 * demás, el acceso a usuarios, se hará a nivel de controlador
 *
 * @param $user El usuario a verificar que tenga el rol admin
 */
    public function isAuthorized($user) {
        /* Obtenemos los datos con los que vamos a validar */
        
        // La acción que se está realizando
        $action_name = $this->request->params['action'];

        // El controlador
        $module_name = $this->name;

        // El id del rol del usuario
        $role_id = $user['roles_id'];

        // El id del usuario
        $user_id = $user['id'];

        // El id del resource
        $resource_id = ($this->request->params['pass'])
            ? $this->request->params['pass'][0]
            : false;

        // Cargamos el modelo para realizar la búsqueda
        $this->loadModel('ModulesActionsRole');
        
        // Cargamos el modelo para realizar la búsqueda
        $this->loadModel('ModulesActionsUser');

        // Verificamos si el usuario está permitido
        if (
                $this->{$this->modelClass}->isResourceOwner(
                    $action_name, $resource_id, $user_id
                )
            ||  $this->ModulesActionsRole->isRoleAllowed(
                    $role_id, $action_name, $module_name
                )
            ||  $this->ModulesActionsUser->isUserAllowed(
                    $user_id, $action_name, $module_name
                )
            ||  $this->isUserSelfEdit(
                    $user_id, $action_name, $module_name, $resource_id
                )
        ){
            return true;
        } else {
            // Seteamos un aviso de que no pueden hacer esto
            $this->Session->setFlash(
                'You are not authorized to do that.',
                'flash-failure'
            );
            // Regresamos un false, lo cual significa acceso fallido
            return false;
        }

    }

    // {{{ isUserSelfEdit()

    /**
     * Esta función verifica que un usuario trate de editarse a si mismo
     *
     * @param Int   $user_id    El id del usuario que realiza la acción
     * @param String $action_name   El nombre de la acción realizada
     * @param String $module_name   El nombre del modulo
     * @param Int   $resource_id    El id del recurso a editar
     */
    public function isUserSelfEdit($user_id, $action_name, $module_name, 
            $resource_id
    ){
        // Checamos que cumpla las condiciones
        if (   $module_name == 'Users'
            && $action_name == 'edit'
            && $user_id == $resource_id
        ){
            // El usuario trata de editarse, lo dejaremos pasar
            return true;
        } else {
            return false;
        }
    }

    // }}}

    // {{{ getModuleId()

    /**
     * Obtenemos el id del modulo que invoque la función
     *
     * @param none
     *
     * @return Int $id El id del modulo en la tabla de modulos
     */
    public function getModuleId($moduleName){
        // Si el modulo a buscar no viene seteado, usamos el nombre
        // de la clase que lo invoca
        $moduleName = (! empty($moduleName)) ? $moduleName : $this->name;
        // Cargamos el modelo para realizar la búsqueda
        $this->loadModel('Modules');
        $data = $this->Modules->find('first', array(
            'conditions' => array(
                'Modules.name' => $moduleName
            )
        ));
        $id = $data['Modules']['id'];
        return $id;
    }

    // }}}

    // {{{ getAuthorizedActions()

    /** 
     * Obtiene los permisos del modulo para el usuario
     *
     * Busca los permisos en base a su rol y en base a su id
     * de usuario
     *
     * @param none
     *
     * @return Array El merge de la lista de acciones por rol y usuario
     */
    public function getAuthorizedActions($moduleName = ''){
        // Si el usuario no está logueado retornamos un array vacio
        if (! $this->Auth->user('id')){
            return array();
        }

        // Obtenemos el id del modulo
        $module_id = $this->getModuleId($moduleName);

        // Cargamos el modelo para realizar la búsqueda
        $this->loadModel('ModulesActionsRole');

        // Realizamos la busqueda de las acciones del rol
        $actionsPerRole = $this->ModulesActionsRole->find('all', array(
                'fields' => array(
                    '`Actions`.`name`',
                ),
                'conditions' => array(
                    'roles_id' => $this->Auth->user('roles_id'),
                    'modules_id' => $module_id,
                ),
            )
        );

        // Volvemos la matriz un vector, es mas trabajable
        $roleActionsList = array();
        foreach ($actionsPerRole as $action){
            array_push($roleActionsList, $action['Actions']['name']);
        }

        // Cargamos el modelo para realizar la búsqueda
        $this->loadModel('ModulesActionsUser');

        // Realizamos la busqueda de las acciones del user
        $actionsPerUser = $this->ModulesActionsUser->find('all', array(
                'fields' => array(
                    '`Actions`.`name`',
                ),
                'conditions' => array(
                    'users_id' => $this->Auth->user('id'),
                    'modules_id' => $module_id,
                ),
            )
        );

        // Volvemos la matriz un vector, es mas trabajable
        $userActionsList = array();
        foreach ($actionsPerUser as $action){
            array_push($userActionsList, $action['Actions']['name']);
        }

        // Mezclamos los permisos de rol y usuarios, y lo regresamos
        return array_merge($roleActionsList, $userActionsList);

    }

    // }}}

    // {{{ invalidParameter()

    /**
     * Esta función se debe de llamar cuando el recurso a buscar
     * sea erróneo, redirige al index y setea un flash de no encontrado
     *
     * @param none
     * @return void
     */

    // }}}
    public function invalidParameter(){
        $this->Session->setFlash(
            'We couldn\'t find the resource you were trying to access',
            'flash-failure'
        );
        $this->redirect(array(
            'action' => 'index'
        ));
    }

}
