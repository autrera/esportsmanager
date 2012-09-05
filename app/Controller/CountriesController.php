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
class CountriesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Countries';

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
	public $uses = array('Country', 'User');

/**
 * Displays a all the countries
 *
 * @param none
 */
    public function index() {
        if (! $countries = Cache::read('countries')) {
            Cache::write('countries', $countries = $this->Country->find('all'));
        }
        $this->set('countries', $countries);
        $this->set('actions', $this->getAuthorizedActions());
    }

/**
 * Damos de alta los paises
 *
 * @param none
 */
	public function add(){
        // TODO
        // Validar que sea imagen
        // Validar que solo admins puedan mover esto

        // Verificamos que sea un envio por POST
		if ($this->request->is('post')) {
            $this->Country->create();
            if ($this->Country->saveWithOptionalFile($this->request,
                $this->Session, array(
                    'fileColumnName' => 'flag',
                    'fileInputName' => 'icon',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
	}

/**
 * Visualiza el pais dado
 *
 * @param int El id del País a mostrar
 */
    public function view($id = null){
        $this->Country->id = $id;

        if (!$this->Country->exists()) {
            $this->invalidParameter();
        }

        if (! $users = Cache::read('users')) {
            Cache::write('users', $users = $this->User->find('all', array(
                'conditions' => array(
                    'Profile.countries_id' => $this->Country->id
                ),
            )));
        }

        if (! $country = Cache::read('country')) {
            Cache::write('country', $country = $this->Country->read(null, $id));
        }

        $this->set('users', $users);
        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', false);
        $this->set('id', $this->Country->id);
        $this->set('country', $country);
    }

/**
 * Edita el pais
 *
 * @param int El id del pais a editar
 */
    public function edit($id = null) {
        // Seteamos le id del pais
        $this->Country->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Country->exists()) {
            $this->invalidParameter();
        }

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Country->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Country->saveWithOptionalFile($this->request,
                $this->Session, array(
                    'fileColumnName' => 'flag',
                    'fileInputName' => 'icon',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
    }

/**
 * Elimina el pais
 *
 * @param int El id del pais a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Country->deleteWithFile($id, 'flag', $this->Session)) {
            $this->redirect(array('action' => 'index'));
        }
    }

}
