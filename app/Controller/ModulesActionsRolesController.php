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
class ModulesActionsRolesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'ModulesActionsRoles';

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
	public $uses = array('ModulesActionsRole', 'Module', 'Action', 'Role');

/**
 * Muestra todos los streams disponibles del usuario
 *
 * @param none
 */
    public function index() {
        $this->set('permisos', $this->ModulesActionsRole->find('all'));
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

        // Obtenemos los roles de la BD
        $this->set('roles', $this->Role->find('list'));

        if ($this->request->is('post')) {
            $this->ModulesActionsRole->create();
            if ($this->ModulesActionsRole->save($this->request->data)) {
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
        $this->ModulesActionsRole->id = $id;
        if (!$this->ModulesActionsRole->exists()) {
            throw new NotFoundException(__('Invalid id'));
        }
        $this->set('permiso', $this->ModulesActionsRole->read(null, $id));
    }

/**
 * Edita el permiso del rol
 *
 * @param int El id del rol a editar
 */
    public function edit($id = null) {
        // Seteamos le id del permiso
        $this->ModulesActionsRole->id = $id;

        // Obtenemos los modulos de la BD
        $this->set('modules', $this->Module->find('list'));

        // Obtenemos las acciones de la BD
        $this->set('actions', $this->Action->find('list'));

        // Obtenemos los roles de la BD
        $this->set('roles', $this->Role->find('list'));

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->ModulesActionsRole->read();
        } else {
            // Intentamos guardar el registro
            if ($this->ModulesActionsRole->save($this->request->data)) {
                $this->Session->setFlash(__('The role has been updated'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The role could not be updated. Try again.'), 'flash-failure');
            }
        }
    }

/**
 * Elimina el permiso del rol
 *
 * @param int El id del permiso a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->ModulesActionsRole->delete($id)) {
            $this->Session->setFlash('The permission with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }

}
