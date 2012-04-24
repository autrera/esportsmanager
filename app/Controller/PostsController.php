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
	// public $uses = array();

/**
 * Displays a all the posts
 *
 * @param none
 */
	public function index() {
		$this->set('posts', $this->Post->find('all'));
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
			if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('The post has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
            }
        }
	}

/**
 * Visualiza el post solicitado
 *
 * @param int El id del post a mostrar
 */
    public function view($id = null){
        $this->Post = $id;
        if (!$this->Post->exists()) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $this->Post->read(null, $id));
    }

}
