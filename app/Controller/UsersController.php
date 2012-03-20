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
	// public $uses = array('User');

/**
 * Permitimos a los usuarios agregarse a si mismos y desloguearse
 *
 * @param none
 * @return void
 */
	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('add', 'login'); 
	}

/**
 * Displays a all the users
 *
 * @param none
 */
    public function index() {
        $this->set('users', $this->User->find('all'));
    }

/**
 * Agrega usuarios
 *
 * @param mixed What page to display
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->User->create();
			if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                // $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
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
		        $this->Session->setFlash(__('Invalid username or password, try again'));
		    }
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
