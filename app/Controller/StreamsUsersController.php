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
class StreamsUsersController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'StreamsUsers';

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
	public $uses = array('StreamsUser', 'Game', 'Stream');

/**
 * Muestra todos los streams disponibles del usuario
 *
 * @param none
 */
    public function index() {
        $this->set('streams', $this->StreamsUser->find('all'));
    }

/**
 * Damos de alta los juegos
 *
 * @param none
 */
	public function add(){
        // Obtenemos los juegos de la BD
        $this->set('games', $this->Game->find('list'));
        // Obtenemos los servicios de streaming de la BD
        $this->set('streams', $this->Stream->find('list'));
        if ($this->request->is('post')) {
            $this->StreamsUser->create();
            $this->request->data['StreamsUser']['users_id'] 
                = $this->Auth->user('id');
            if ($this->StreamsUser->save($this->request->data)) {
                $this->Session->setFlash(__('Your stream has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Your stream could not be saved. Please, try again.'), 'flash-failure'
                );
            }
        }
	}

/**
 * Visualiza el stream dado
 *
 * @param int El id del stream a mostrar
 */
    public function view($id = null){
        $this->StreamsUser->id = $id;
        if (!$this->StreamsUser->exists()) {
            $this->invalidParameter();
        }
        $this->set('Stream', $this->StreamsUser->read(null, $id));
    }

/**
 * Edita el stream del usuario
 *
 * @param int El id del stream a editar
 */
    public function edit($id = null) {
        // Seteamos le id del avatar
        $this->StreamsUser->id = $id;
        // Obtenemos los juegos de la BD
        $this->set('games', $this->Game->find('list'));
        // Obtenemos los servicios de streaming de la BD
        $this->set('streams', $this->Stream->find('list'));
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->StreamsUser->read();
        } else {
            // Intentamos guardar el registro
            $this->request->data['StreamsUser']['users_id'] 
                = $this->Auth->user('id');
            if ($this->StreamsUser->save($this->request->data)) {
                $this->Session->setFlash(__('Your stream has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Your stream could not be saved. Try again.'), 'flash-failure');
            }
        }
    }

/**
 * Elimina el stream del usuario
 *
 * @param int El id del stream a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->StreamsUser->delete($id)) {
            $this->Session->setFlash('The stream with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }

}
