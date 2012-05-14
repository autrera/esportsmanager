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
class ModulesActionsUsersController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'ModulesActionsUsers';

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
	public $uses = array('ModulesActionsUser', 'Module', 'Action', 'User');

/**
 * Muestra todos los streams disponibles del usuario
 *
 * @param none
 */
    public function index() {
        $this->set('permisos', $this->ModulesActionsUser->find('all'));
        $this->set('actions', $this->getAuthorizedActions());
    }

/**
 * Agregamos permisos a un rol
 *
 * @param none
 */
	public function add(){
        // Obtenemos los modulos de la BD
        $this->set('modules', $this->Module->find('list'));

        // Obtenemos las acciones de la BD
        $this->set('actions', $this->Action->find('list'));

        // Obtenemos los usuarios de la BD
        $this->set('users', $this->User->find('list'));

        if ($this->request->is('post')) {
            $this->ModulesActionsUser->create();
            if ($this->ModulesActionsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The permission has been saved'),
                    'flash-success'
                );
                // $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The permission could not be saved. Please, try again.'), 'flash-failure'
                );
            }
        }
	}

/**
 * Visualiza el permiso dado
 *
 * @param int El id del permiso a mostrar
 */
    public function view($id = null){
        $this->ModulesActionsUser->id = $id;
        if (!$this->ModulesActionsUser->exists()) {
            $this->invalidParameter();
        }

        $permiso = $this->ModulesActionsUser->read(null, $id);

        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', false);

        $this->set('id', $this->ModulesActionsUser->id);
        $this->set('permiso', $permiso);
    }

/**
 * Edita el permiso del rol
 *
 * @param int El id del rol a editar
 */
    public function edit($id = null) {
        // Seteamos le id del permiso
        $this->ModulesActionsUser->id = $id;

        // Verificamos que el recurso exista
        if (!$this->ModulesActionsUser->exists()) {
            $this->invalidParameter();
        }

        // Obtenemos los modulos de la BD
        $this->set('modules', $this->Module->find('list'));

        // Obtenemos las acciones de la BD
        $this->set('actions', $this->Action->find('list'));

        // Obtenemos los usuarios de la BD
        $this->set('users', $this->User->find('list'));

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->ModulesActionsUser->read();
        } else {
            // Intentamos guardar el registro
            if ($this->ModulesActionsUser->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been updated'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be updated. Try again.'), 'flash-failure');
            }
        }
    }

/**
 * Elimina el permiso del usuario
 *
 * @param int El id del permiso a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->ModulesActionsUser->delete($id)) {
            $this->Session->setFlash('The permission with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }

}
