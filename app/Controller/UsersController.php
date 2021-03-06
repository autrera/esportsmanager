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
class UsersController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Users';

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
	public $uses = array('User', 'Team', 'Role', 'Video', 'Gallery', 'News', 'Profile', 'Post');

/**
 * Permitimos a los usuarios agregarse a si mismos y desloguearse
 *
 * @param none
 * @return void
 */
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add', 'login', 'requestPasswordReset', 'logout');
	}

/**
 * Displays a all the users
 *
 * @param none
 */
    public function index() {
        if (! $users = Cache::read('users')) {
            Cache::write('users', $users = $this->User->find('all'));
        }
        $this->set('users', $users);
    }

/**
 * Agrega usuarios
 *
 * @param mixed What page to display
 */
	public function add() {
        App::uses('utilities', 'Lib');
        $captcha = utilities::validateCaptcha();
		if ($this->request->is('post')) {
            if ($captcha->is_valid){
                $this->User->create();
    			if ($this->User->save($this->request->data)) {
                    Cache::delete('users');
                    $this->Session->setFlash(__('The user has been saved'),
                        'flash-success'
                    );
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash-failure'
                    );
                }
            } else {
                if ($captcha->error){
                    $this->Session->setFlash(
                        __($captcha->error.'. Please, try again.'),
                        'flash-failure'
                    );
                }
            }
        }
	}

/**
 * Edita el usuario
 *
 * @param int El id del usuario a editar
 */
    public function edit($id = null) {
        // Seteamos le id del usuario
        $this->User->id = $id;

        // Verificamos que el recurso exista
        if (!$this->User->exists()) {
            $this->invalidParameter();
        }

        // Seteamos las acciones permitidas de este usurio
        $this->set('actions', $this->getAuthorizedActions());

        // Seteamos los posibles roles del usuario
        $this->set('roles', $this->Role->find('list'));

        // Seteamos los posibles teams del usuario
        $this->set('teams', $this->Team->find('list'));

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->User->read();
        } else {
            // Intentamos guardar el registro
            if ($this->User->save($this->request->data)) {
                // Guardado exitoso
                Cache::delete('users');
                $this->Session->setFlash(
                    'The user have been updated.',
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                // Guardado fallido
                $this->Session->setFlash(
                    'Unable to update the user.',
                    'flash-failure'
                );
            }
        }
    }

/**
 * Visualiza el usuario dado
 *
 * @param int El id del usuario a mostrar
 */
    public function view($id = null){
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->invalidParameter();
        }

        $latestPosts = $this->Post->find('all', array(
            'conditions' => array(
                'users_id' => $this->User->id,
            ),
            'order' => 'Post.id DESC',
            'limit' => 5,
        ));

        $latestVideos = $this->Video->find('all', array(
            'conditions' => array(
                'users_id' => $this->User->id,
            ),
            'order' => 'Video.id DESC',
            'limit' => 5,
        ));

        $latestNews = $this->News->find('all', array(
            'conditions' => array(
                'users_id' => $this->User->id,
            ),
            'order' => 'News.id DESC',
            'limit' => 5,
        ));

        $latestGalleries = $this->Gallery->find('all', array(
            'conditions' => array(
                'users_id' => $this->User->id,
            ),
            'order' => 'Gallery.id DESC',
            'limit' => 2,
        ));

        $this->Profile->id = $this->Profile->field('id', array(
            'Profile.users_id' => $this->User->id,
        ));


        $this->set('latestPosts', $latestPosts);
        $this->set('latestVideos', $latestVideos);
        $this->set('latestNews', $latestNews);
        $this->set('latestGalleries', $latestGalleries);
        $this->set('actions', $this->getAuthorizedActions());
        $this->set('profileActions', $this->getAuthorizedActions('Profiles'));
        $this->set('isOwner', ($this->User->id == $this->Auth->user('id')));
        $this->set('isProfileOwner', $this->Profile->isOwnedBy(
            $this->Profile->id, $this->Auth->user('id')
        ));
        $this->set('id', $this->User->id);
        $this->set('usuario', $this->User->read(null, $id));
    }


/**
 * Logueamos a los usuarios
 *
 * @param none
 * @return void
 */
	public function login() {
		if ($this->request->is('post')){
		    if ($this->Auth->login()) {
		        $this->redirect($this->Auth->redirect());
		    } else {
		        $this->Session->setFlash(__('Invalid username or password, try again'), 'flash-failure');
		    }
		}
        // Si el usuario entra aquí y ya está logueado lo mandamos al index
        if ($this->Auth->user('id')){
            $this->redirect(array(
                'controller' => 'pages',
                'action' => 'display'
            ));
        }
        if ($this->User->validates()) {
            if ($this->Auth->user()) {
                $this->redirect($this->Auth->redirect());
            }
        }
	}

/**
 * Muestra un form al usuario para que ingrese su correo y solicite cambio pass
 *
 * @param none
 * @return void
 */
    public function requestPasswordReset(){
        // Verificamos que el usuario no esté logueado
        if ($this->Auth->user){
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'view',
                $this->Auth->user('id')
            ));
        } else {

        }
    }

/**
 * Deslogueamos a los usuarios
 *
 * @param none
 * @return void
 */
	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

}
