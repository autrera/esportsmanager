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
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'news',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'display', 'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email')
                )
            ),
            'authorize' => array(
                'Controller'
            )
        )
    );

    // Le permitimos a todos ver el listado y un elemento en particular
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
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

}
