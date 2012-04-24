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
                'controller' => 'posts',
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
        // Sólo el dueño y los admins pueden editar y eliminar
        $accion = $this->request->params['action'];
        if (in_array($accion, array('delete', 'edit'))){
            $elemento = $this->request->params['pass'][0];
            if ($this->{$this->modelClass}->isOwnedBy($elemento, $user['id'])){
                return true;
            }
        }

        // Debemos buscar en la BD si el rol o el id del usuario
        // permiten la acción solicitada

        // Default deny
        return false;
    }

}
