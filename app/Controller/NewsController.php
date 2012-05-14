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
class NewsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'News';

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
	public $uses = array('News', 'Game', 'Profile');

/**
 * Displays a all the posts
 *
 * @param none
 */
	public function index() {
        $this->set('actions', $this->getAuthorizedActions());
        // Seteamos las news a mostrar
        $this->set('news', 
            $this->News->find('all', array(
                'fields' => array(
                    'Users.*', 'Profiles.*', 'News.*', 'Games.*'
                ),
                'joins' => array(
                    array(
                        'alias' => 'Profiles',
                        'table' => 'profiles',
                        'type' => 'LEFT',
                        'conditions' => '`Profiles`.`users_id` = `News`.`users_id`'
                    )
                ),
            )
        ));
	}

/**
 * Agregamos news
 *
 * @param none
 */
	public function add() {
        // Consultamos los games a los que puede relacionarse la new
        $this->set('games', $this->Game->find('list'));

        // Verificamos que el request sea un post
		if ($this->request->is('post')) {
            $this->News->create();
            // Seteamos el id del usuario, será dueño de la new
            $this->request->data['News']['users_id'] = $this->Auth->user('id');
            // Seteamos el slug
            $this->request->data['News']['slug'] = Inflector::slug(
                utf8_encode($this->request->data['News']['title'])
            );
            // Guardamos la new
			if ($this->News->save($this->request->data)) {
                // Todo salió bien asi que lo informamos
                $this->Session->setFlash(__('The post has been saved'), 'flash-success');
                $this->redirect(array('action' => 'index'));
            } else {
                // Algo falló y no se guardó
                $this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'flash-failure');
            }
        }
	}

/**
 * Visualiza la noticia dada
 *
 * @param int El id de la noticia a mostrar
 */
    public function view($slug){
        $noticia = $this->News->find('first', array(
            'conditions' => array(
                'slug' => $slug
            )
        ));

        $this->News->id = $noticia['News']['id'];
        $user_id = $noticia['Users']['id'];

        // Verificamos que el recurso exista
        if (!$this->News->exists()) {
            $this->invalidParameter();
        }

        if (!$this->News->id) {
            $this->invalidParameter();
        }

        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', $this->News->isOwnedBy(
            $this->News->id, $this->Auth->user('id')
        ));

        // Buscamos el perfil del usario
        $this->set('profile',
            $this->Profile->find('first', array(
                'conditions' => array(
                    'users_id' => $user_id
                )
            ))
        );

        // Leemos la noticia y la mandamos a la vista
        $this->set('noticia', $this->News->read(null, $this->News->id));
        $this->set('id', $this->News->id);
    }

/**
 * Edita la noticia
 *
 * @param int El id de la noticia a editar
 */
    public function edit($id = null) {
        // Consultamos los games a los que puede relacionarse la new
        $this->set('games', $this->Game->find('list'));

        // Seteamos le id de las news
        $this->News->id = $id;
        
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->News->read();
        } else {
            // Seteamos el slug
            $this->request->data['News']['slug'] = Inflector::slug(
                utf8_encode($this->request->data['News']['title'])
            );
            // Intentamos guardar el registro
            if ($this->News->save($this->request->data)) {
                // Guardado exitoso
                $this->Session->setFlash(
                    'Your news have been updated.',
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                // Guardado fallido
                $this->Session->setFlash(
                    'Unable to update your news.',
                    'flash-failure'
                );
            }
        }
    }

/**
 * Elimina la noticia
 *
 * @param int El id de la noticia a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->News->delete($id)) {
            $this->Session->setFlash(
                'The news with id: ' . $id . ' has been deleted.',
                'flash-success'
            );
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(
                'Unable to delete de element.',
                'flash-failure'
            );
            $this->redirect(array('action' => 'index'));
        }
    }

}
