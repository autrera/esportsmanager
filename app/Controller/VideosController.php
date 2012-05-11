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
class VideosController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Videos';

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
	public $uses = array('Video', 'Profile', 'User');

/**
 * Displays a all the videos
 *
 * @param none
 */
	public function index() {
        $this->set('videos', $this->Video->find('all'));
        $this->set('actions', $this->getAuthorizedActions());
	}

/**
 * Agregamos videos
 *
 * @param none
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->Video->create();
            $this->request->data['Video']['users_id'] 
                = $this->Auth->user('id');
			if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('The post has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The video could not be saved. Please, try again.'), 'flash-failure');
            }
        }
	}

/**
 * Visualiza el video dado
 *
 * @param int El id del Perfil a mostrar
 */
    public function view($id = null){
        $this->Video->id = $id;
        if (!$this->Video->exists()) {
            throw new NotFoundException(__('Invalid video'));
        }

        $video = $this->Video->read(null, $id);
        
        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', $this->Video->isOwnedBy(
            $this->Video->id, $this->Auth->user('id')
        ));

        // Buscamos el perfil del usario
        $this->set('profile',
            $this->Profile->find('first', array(
                'conditions' => array(
                    'users_id' => $video['Users']['id']
                )
            ))
        );

        $this->set('id', $this->Video->id);
        $this->set('video', $video);
    }

/**
 * Edita el video
 *
 * @param int El id del video a editar
 */
    public function edit($id = null) {
        // Seteamos le id de las news
        $this->Video->id = $id;
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Video->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Video->save($this->request->data)) {
                // Guardado exitoso
                $this->Session->setFlash(
                    'Your video have been updated.',
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                // Guardado fallido
                $this->Session->setFlash(
                    'Unable to update your video.',
                    'flash-failure'
                );
            }
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
        if ($this->Video->delete($id)) {
            $this->Session->setFlash('The video with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }



}
