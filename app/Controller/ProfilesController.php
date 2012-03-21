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
	public $uses = array('User', 'Avatar', 'Profile', 'Country');

/**
 * Agrega un perfil al usuario
 *
 * @param mixed What page to display
 */
	public function add() {
        // Checamos que esté logueado
        if ($this->Auth->user('id')){
            // Consultamos si el usuario tiene ya un perfil
            $datos = $this->Profile->find('first', array(
                'conditions' => array(
                    'Profile.users_id' => $this->Auth->user('id')
                ) 
            ));
            // Checamos que no tenga un perfil
            if (empty($datos['Profile']['id'])){
                $this->set('avatars',   $this->Avatar->find('list'));
                $this->set('countries', $this->Country->find('list'));
        		if ($this->request->is('post')) {
                    $this->Profile->create();
                    $this->request->data['Profile']['users_id'] = $this->Auth->user('id');
        			if ($this->Profile->save($this->request->data)) {
                        $this->Session->setFlash(__('The profile has been saved'));
                    } else {
                        $this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
                    }
                }
            } else {
                // Como ya tiene un perfil, no puede agregar otro
                // Lo enviamos a editar su perfil
                $this->redirect(array(
                    'action' => 'view',
                    $datos['Profile']['id']
                ));
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
            throw new NotFoundException(__('Invalid profile'));
        }
        $this->set('perfil', $this->Profile->read(null, $id));
    }

}
