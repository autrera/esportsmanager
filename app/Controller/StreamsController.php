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
class StreamsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Streams';

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
        $this->set('streams', $this->Stream->find('all'));
	}

/**
 * Agregamos videos
 *
 * @param none
 */
	public function add() {
        // Verificamos que sea un envio por POST
        if ($this->request->is('post')) {
            $this->Stream->create();
            $this->Stream->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'icon',
                    'fileInputName' => 'logo'
                )
            );
        }
	}

/**
 * Visualiza el video dado
 *
 * @param int El id del Perfil a mostrar
 */
    public function view($id = null){
        $this->Stream->id = $id;
        if (!$this->Stream->exists()) {
            $this->invalidParameter();
        }
        $this->set('stream', $this->Stream->read(null, $id));
    }

/**
 * Edita el video
 *
 * @param int El id del video a editar
 */
    public function edit($id = null) {
        // Seteamos le id de las news
        $this->Stream->id = $id;
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Stream->read();
        } else {
            // Intentamos guardar el registro
            $this->Stream->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'icon',
                    'fileInputName' => 'logo'
                )
            );
        }
    }

/**
 * Elimina el video
 *
 * @param int El id del video a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Stream->delete($id)) {
            $this->Session->setFlash('The stream with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }

}
