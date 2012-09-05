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
class GalleriesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Galleries';

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
	// public $uses = array('User', 'Avatar', 'Profile', 'Country');

/**
 * Agrega una galeria
 *
 * @param none
 */
	public function add() {
        // Checamos que venga de un post
		if ($this->request->is('post')) {
            $this->Gallery->create();
            // Seteamos el usuario que está haciendo el guardado
            $this->request->data['Gallery']['users_id'] = $this->Auth->user('id');
            // Seteamos el slug
            $this->request->data['Gallery']['slug'] = Inflector::slug(
                $this->request->data['Gallery']['name']
            );
            // Guardamos
			if ($this->Gallery->save($this->request->data)) {
                Cache::delete('galleries');
                $this->Session->setFlash(__('The gallery has been saved'),
                    'flash-success'
                );
                $this->redirect(array(
                    'controller' => 'photos',
                    'action' => 'add',
                    $this->Gallery->id
                ));
            } else {
                $this->Session->setFlash(__('The gallery could not be saved. Please, try again.'), 'flash-failure');
            }
        }
	}

/**
 * Visualiza el perfil dado
 *
 * @param int El id del Perfil a mostrar
 */
    public function view($slug){
        $galeria = $this->Gallery->find('first', array(
            'conditions' => array(
                'slug' => $slug
            )
        ));

        $this->Gallery->id = $galeria['Gallery']['id'];

        if (!$this->Gallery->exists()) {
            $this->invalidParameter();
        }

        $this->set('actionsPhotos', $this->getAuthorizedActions('Photos'));
        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', $this->Gallery->isOwnedBy(
            $this->Gallery->id, $this->Auth->user('id')
        ));

        $this->set('galeria', $galeria);
        $this->set('id', $this->Gallery->id);
    }

/**
 * Displays a all the galleries
 *
 * @param none
 */
    public function index() {
        if (! $galleries = Cache::read('galleries')) {
            Cache::write('galleries', $galleries = $this->Gallery->find('all', array(
                'order' => 'Gallery.id DESC'
            )));
        }
        $this->set('galleries', $galleries);
        $this->set('actions', $this->getAuthorizedActions());
    }

/**
 * Edita la galeria
 *
 * @param int El id de la galeria a editar
 */
    public function edit($id = null) {
        // Seteamos le id de la galeria
        $this->Gallery->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Gallery->exists()) {
            $this->invalidParameter();
        }

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Gallery->read();
        } else {
            // Seteamos el slug
            $this->request->data['Gallery']['slug'] = Inflector::slug(
                $this->request->data['Gallery']['name']
            );
            // Intentamos guardar el registro
            if ($this->Gallery->save($this->request->data)) {
                // Guardado exitoso
                Cache::delete('galleries');
                $this->Session->setFlash(
                    'Your gallery have been updated.',
                    'flash-sucess'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                // Guardado fallido
                $this->Session->setFlash(
                    'Unable to update your gallery.',
                    'flash-failure'
                );
            }
        }
    }

/**
 * Elimina la noticia
 *
 * @param int El id de la galeria a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Gallery->delete($id)) {
            Cache::delete('galleries');
            $this->Session->setFlash('The gallery with id: ' . $id . ' has been deleted.', 'flash-sucess');
            $this->redirect(array('action' => 'index'));
        }
    }


}
