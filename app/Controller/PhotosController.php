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
class PhotosController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Photos';

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
 * @param Int $id The Id of the gallery where the photos belong
 */
	public function add($id) {
        // Checamos que esté logueado
        if ($this->Auth->user('id')){
            // Checamos que venga de un post
    		if ($this->request->is('post')) {
                $this->Photo->create();
                // Seteamos la galeria a la que se estará agregando la photo
                $this->request->data['Photo']['galleries_id'] = $id;
                // Seteamos el usuario que está haciendo el guardado
                $this->request->data['Photo']['users_id'] = $this->Auth->user('id');
                // Guardamos
    			if ($this->Gallery->save($this->request->data)) {
                    $this->Session->setFlash(__('The gallery has been saved'));
                } else {
                    $this->Session->setFlash(__('The gallery could not be saved. Please, try again.'));
                }
            }
        }
	}

/**
 * Visualiza el perfil dado
 *
 * @param int El id del Perfil a mostrar
 */
    public function view($id = null){
        $this->Gallery->id = $id;
        if (!$this->Gallery->exists()) {
            throw new NotFoundException(__('Invalid gallery'));
        }
        $this->set('galeria', $this->Gallery->read(null, $id));
    }

}
