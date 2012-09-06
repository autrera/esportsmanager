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
class PostsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Posts';

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
	public $uses = array('Post', 'Profile');

/**
 * Code to run after actions are ran and rendered
 *
 */
    public function afterFilter() {
        // Si la acción solicitada es 'view'
        if ($this->request->params['action'] == 'view') {
            // Obtenemos el id del post en base a su slug
            $this->Post->id = $this->Post->field('id', array(
                'Post.slug' => $this->passedArgs[0]
            ));
            // Incrementamos el contador de vistas de la noticia
            $this->Post->increaseCounter();
        }
    }

/**
 * Displays a all the posts
 *
 * @param none
 */
	public function index() {
        if (! $posts = Cache::read('posts')) {
            Cache::write('posts', $posts = $this->Post->find('all', array(
                'order' => 'Post.id DESC'
            )));
        }
		$this->set('posts', $posts);
        $this->set('actions', $this->getAuthorizedActions());
	}

/**
 * Agregamos posts
 *
 * @param none
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['users_id'] = $this->Auth->user('id');
            // Seteamos el slug
            $this->request->data['Post']['slug'] = Inflector::slug(
                $this->request->data['Post']['title']
            );
			if ($this->Post->save($this->request->data)) {
                Cache::delete('posts');
                Cache::delete('latestPosts');
                $this->Session->setFlash(__('The post has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The post could not be saved. Please, try again.'), 'flash-failure');
            }
        }
	}

/**
 * Visualiza el post solicitado
 *
 * @param int El id del post a mostrar
 */
    public function view($slug){
        $post = $this->Post->find('first', array(
            'conditions' => array(
                'slug' => $slug
            )
        ));

        $this->Post->id = $post['Post']['id'];

        // Verificamos que el recurso exista
        if (!$this->Post->exists()) {
            $this->invalidParameter();
        }

        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', $this->Post->isOwnedBy(
            $this->Post->id, $this->Auth->user('id')
        ));

        // Buscamos el perfil del usario
        $this->set('profile',
            $this->Profile->find('first', array(
                'conditions' => array(
                    'users_id' => $post['Users']['id']
                )
            ))
        );

        $this->set('id', $this->Post->id);
        $this->set('post', $post);
    }

/**
 * Edita el post
 *
 * @param int El id del post a editar
 */
    public function edit($id = null) {
        // Seteamos le id de las news
        $this->Post->id = $id;
        // Verificamos que el recurso exista
        if (!$this->Post->exists()) {
            $this->invalidParameter();
        }
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Post->read();
        } else {
            // Seteamos el slug
            $this->request->data['Post']['slug'] = Inflector::slug(
                $this->request->data['Post']['title']
            );
            // Intentamos guardar el registro
            if ($this->Post->save($this->request->data)) {
                // Guardado exitoso
                Cache::delete('posts');
                Cache::delete('latestPosts');
                $this->Session->setFlash(
                    'Your post have been updated.',
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                // Guardado fallido
                $this->Session->setFlash(
                    'Unable to update your post.',
                    'flash-failure'
                );
            }
        }
    }

/**
 * Elimina el post
 *
 * @param int El id del post a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Post->delete($id)) {
            Cache::delete('posts');
            Cache::delete('latestPosts');
            $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }


}
