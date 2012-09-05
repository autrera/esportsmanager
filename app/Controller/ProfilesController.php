<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class ProfilesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Profiles';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Profile', 'User', 'Avatar', 'Country');

/**
 * Agrega un perfil al usuario
 *
 * @param mixed What page to display
 */
	public function add($userId) {
        $this->User->id = $userId;

        // Verificamos que el recurso exista
        if (!$this->User->exists()) {
            $this->invalidParameter();
        }

        // Consultamos si el usuario tiene ya un perfil
        $datos = $this->Profile->find('first', array(
            'conditions' => array(
                'Profile.users_id' => $this->User->id
            )
        ));
        // Checamos que no tenga un perfil
        if (empty($datos['Profile']['id'])){
            $this->set('countries', $this->Country->find('list'));
    		if ($this->request->is('post')) {
                $this->Profile->create();
                $this->request->data['Profile']['users_id'] = $this->User->id;
                if ($this->Profile->saveWithOptionalFile(
                    $this->request, $this->Session, array(
                        'fileColumnName' => 'picture',
                        'fileInputName' => 'image',
                    )
                )){
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'view',
                        $this->User->id
                    ));
                } else {
                }
            }
        } else {
            // Como ya tiene un perfil, no puede agregar otro
            // Lo enviamos a editar su perfil
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'view',
                $this->User->id
            ));
        }
	}

/**
 * Edita el perfil
 *
 * @param int El id del perfil a editar
 */
    public function edit($id = null) {
        // Seteamos le id del perfil
        $this->Profile->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Profile->exists()) {
            $this->invalidParameter();
        }

        // Obtenemos el id del usuario
        $userId = $this->Profile->field('users_id', array(
            'Profile.id' => $this->Profile->id
        ));

        // Seteamos los paises para llenar el select
        $this->set('countries', $this->Country->find('list'));
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Profile->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Profile->saveWithOptionalFile(
                $this->request, $this->Session, array(
                    'fileColumnName' => 'picture',
                    'fileInputName' => 'image'
                )
            )){
                $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'view',
                    $userId
                ));
            } else {
            }
        }
    }


/**
 * Visualiza el perfil dado
 *
 * @param int El id del Perfil a mostrar
 */
    public function view($id = null){
        $this->Profile->id = $id;
        if (!$this->Profile->exists()) {
            $this->invalidParameter();
        }
        $data = $this->Profile->read(null, $id);
        $this->redirect(array(
            'controller' => 'users',
            'action' => 'view',
            $data['Users']['id']
        ));
    }

}
