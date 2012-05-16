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
class GamesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Games';

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
	public $uses = array();

/**
 * Displays a all the games
 *
 * @param none
 */
    public function index() {
        $this->set('actions', $this->getAuthorizedActions());
        $this->set('games', $this->Game->find('all'));
    }

/**
 * Damos de alta los juegos
 *
 * @param none
 */
	public function add(){
        // TODO
        // Validar que sea imagen
        // Validar que solo admins puedan mover esto

        // Verificamos que sea un envio por POST
		if ($this->request->is('post')) {
            $this->Game->create();
            if ($this->Game->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'thumbnail',
                    'fileInputName' => 'upload',
                    'fileOptional' => false,
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
	}

/**
 * Visualiza el juego dado
 *
 * @param int El id del juego a mostrar
 */
    public function view($id = null){
        $this->Game->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Game->exists()) {
            $this->invalidParameter();
        }

        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', false);

        $this->set('game', $this->Game->read(null, $id));
        $this->set('id', $this->Game->id);
    }

/**
 * Edita el juego
 *
 * @param int El id del juego a editar
 */
    public function edit($id = null) {
        // Seteamos le id del juego
        $this->Game->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Game->exists()) {
            $this->invalidParameter();
        }

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Game->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Game->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'thumbnail',
                    'fileInputName' => 'upload',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
    }

/**
 * Elimina el juego
 *
 * @param int El id del juego a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Game->delete($id)) {
            $this->Session->setFlash('The game with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

}
