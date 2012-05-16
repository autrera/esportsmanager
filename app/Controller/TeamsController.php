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
class TeamsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Teams';

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
	public $uses = array('Team', 'Game', 'Profile');

/**
 * Damos de alta los teams
 *
 * @param none
 */
	public function add(){
        // TODO
        // Validar que sea imagen
        // Validar que solo admins puedan mover esto

        $this->set('games', $this->Game->find('list'));
        // Verificamos que sea un envio por POST
		if ($this->request->is('post')) {
            $this->Team->create();
            if ($this->Team->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'photo',
                    'fileInputName' => 'picture',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
	}

/**
 * Visualiza el team dado
 *
 * @param int El id del team a mostrar
 */
    public function view($id = null){
        $this->Team->id = $id;
        if (!$this->Team->exists()) {
            $this->invalidParameter();
        }
        // Buscamos el team
        $team = $this->Team->find('first', array(
            'conditions' => array(
                'Team.id' => $this->Team->id
            )
        ));

        foreach ($team['Users'] as $userkey => $user){
            $team['Users'][$userkey]
                = $this->Profile->find('first', array(
                    'conditions' => array(
                        'users_id' => $user['id']
                    ),
                ));
        }

        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', false);
        $this->set('id', $this->Team->id);
        $this->set('team', $team);
    }

/**
 * Displays a all the teams
 *
 * @param none
 */
    public function index() {
        $this->set('actions', $this->getAuthorizedActions());

        // Buscamos todos los teams
        $teams = $this->Team->find('all');

        // Buscamos el perfil de cada usuario y lo anexamos a la matriz
        foreach ($teams as $teamkey => $team){
            foreach ($team['Users'] as $userkey => $user){
                $teams[$teamkey]['Users'][$userkey]
                    = $this->Profile->find('first', array(
                        'conditions' => array(
                            'users_id' => $user['id']
                        ),
                    ));
            }
        }

        // Enviamos la matriz a la vista
        $this->set('teams', $teams);
    }

/**
 * Edita el equipo
 *
 * @param int El id del equipo a editar
 */
    public function edit($id = null) {
        // Seteamos le id del equipo
        $this->Team->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Team->exists()) {
            $this->invalidParameter();
        }
        
        $this->set('games', $this->Game->find('list'));
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Team->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Team->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'photo',
                    'fileInputName' => 'picture',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
    }

/**
 * Elimina el team
 *
 * @param int El id del team a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Video->deleteWithFile($id, 'photo', $this->Session)) {
            $this->redirect(array('action' => 'index'));
        }
    }



}
