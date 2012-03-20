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
	// public $uses = array('News', 'Profile', 'User');

/**
 * Displays a all the posts
 *
 * @param none
 */
	public function index() {
        $this->set('news', 
            $this->News->find('all', array(
                'fields' => array(
                    'Users.*', 'Profiles.*', 'News.*'
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
 * Agregamos posts
 *
 * @param none
 */
	public function add() {
		if ($this->request->is('post')) {
            $this->News->create();
            $this->request->data['News']['users_id'] = $this->Auth->user('id');
			if ($this->News->save($this->request->data)) {
                $this->Session->setFlash(__('The post has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
            }
        }
	}

}
