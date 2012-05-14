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
class RolesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Roles';

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
	// public $uses = array('News', 'Profile', 'User');

/**
 * Displays a all the videos
 *
 * @param none
 */
	public function index() {
        $this->set('roles', $this->Role->find('all'));
        $this->set('actions', $this->getAuthorizedActions());
	}

/**
 * Agregamos videos
 *
 * @param none
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->Role->create();
			if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('The role has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The role could not be saved. Please, try again.'), 'flash-failure');
            }
        }
	}

/**
 * Visualiza el rol dado
 *
 * @param int El id del Rol a mostrar
 */
    public function view($id = null){
        // De momento deshabilitaremos la vista de roles
        // Dirigimos al index
        $this->redirect(array('action' => 'index'));
        $this->Role->id = $id;
        if (!$this->Role->exists()) {
            $this->invalidParameter();
        }
        $this->set('rol', $this->Role->read(null, $id));
    }

/**
 * Edita el rol
 *
 * @param int El id del rol a editar
 */
    public function edit($id = null) {
        // Seteamos le id del rol
        $this->Role->id = $id;
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Role->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Role->save($this->request->data)) {
                // Guardado exitoso
                $this->Session->setFlash(
                    'Your role have been updated.',
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                // Guardado fallido
                $this->Session->setFlash(
                    'Unable to update the role.',
                    'flash-failure'
                );
            }
        }
    }

/**
 * Elimina el rol
 *
 * @param int El id del rol a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Role->delete($id)) {
            $this->Session->setFlash('The role with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }



}
