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
class GamesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Games';

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
	public $uses = array();

/**
 *
 *
 *
 */
	public function add(){
        // Checamos que esté logueado
        if ($this->Auth->user('id')){
    		if ($this->request->is('post')) {
                $this->Game->create();
                extract($this->request->data['Game']['thumbnail']);
                if ($this->Game->isUploadedFile(
                    $this->request->data['Game']['thumbnail'])
                ) {
                    $fileFolder = ROOT . DS . APP_DIR . DS . WEBROOT_DIR . DS . 'uploads' . DS . 'games' . DS . $name;
                    if (move_uploaded_file($tmp_name, $fileFolder)){
                        $this->request->data['Game']['thumbnail'] = 
                            $fileFolder;
            			if ($this->Game->save($this->request->data)) {
                            $this->Session->setFlash(__('The game has been saved'));
                        } else {
                            $this->Session->setFlash(__('The game could not be saved. Please, try again.'));
                        }
                    }
                }
            }
        }
	}

}
