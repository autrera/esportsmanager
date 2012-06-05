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

App::import('Vendor', 'OAuth/OAuthClient');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class StreamsUsersController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'StreamsUsers';

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
	public $uses = array('StreamsUser', 'Game', 'Stream');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('startUserAuth', 'recieveUserAuth'); 
    }

/**
 * Muestra todos los streams disponibles del usuario
 *
 * @param none
 */
    public function index() {
        $streams = $this->StreamsUser->find('all');
        echo "<pre>";
        print_r($streams);
        echo "</pre>";
        // $streamProvider = $this->Stream->find('all');
        // $this->set('streams', );
    }

/**
 * Damos de alta los juegos
 *
 * @param Int $streamId El id del provedor de stream
 */
	public function add(){
        $this->redirect(array('action' => 'startUserAuth', '1'));
        // // Obtenemos los juegos de la BD
        // $this->set('games', $this->Game->find('list'));
        // // Obtenemos los servicios de streaming de la BD
        // $this->set('streams', $this->Stream->find('list'));
        // if ($this->request->is('post')) {
        //     $this->StreamsUser->create();
        //     $this->request->data['StreamsUser']['users_id'] 
        //         = $this->Auth->user('id');
        //     if ($this->StreamsUser->save($this->request->data)) {
        //         $this->Session->setFlash(__('Your stream has been saved'),
        //             'flash-success'
        //         );
        //         $this->redirect(array('action' => 'index'));
        //     } else {
        //         $this->Session->setFlash(__('Your stream could not be saved. Please, try again.'), 'flash-failure'
        //         );
        //     }
        // }
	}

/**
 * Visualiza el stream dado
 *
 * @param int El id del stream a mostrar
 */
    public function view($id = null){
        $this->StreamsUser->id = $id;
        if (!$this->StreamsUser->exists()) {
            $this->invalidParameter();
        }
        $this->set('Stream', $this->StreamsUser->read(null, $id));
    }

/**
 * Edita el stream del usuario
 *
 * @param int El id del stream a editar
 */
    public function edit($id = null) {
        // Seteamos le id del avatar
        $this->StreamsUser->id = $id;

        // Verificamos que el recurso exista
        if (!$this->StreamsUser->exists()) {
            $this->invalidParameter();
        }
        
        // Obtenemos los juegos de la BD
        $this->set('games', $this->Game->find('list'));
        // Obtenemos los servicios de streaming de la BD
        $this->set('streams', $this->Stream->find('list'));
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->StreamsUser->read();
        } else {
            // Intentamos guardar el registro
            $this->request->data['StreamsUser']['users_id'] 
                = $this->Auth->user('id');
            if ($this->StreamsUser->save($this->request->data)) {
                $this->Session->setFlash(__('Your stream has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Your stream could not be saved. Try again.'), 'flash-failure');
            }
        }
    }

/**
 * Elimina el stream del usuario
 *
 * @param int El id del stream a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->StreamsUser->delete($id)) {
            $this->Session->setFlash('The stream with id: ' . $id . ' has been deleted.', 'flash-success');
            $this->redirect(array('action' => 'index'));
        }
    }

/**
 * Inicia la autentificación del usuario con el provedor de streaming
 *
 * @param int El id del stream
 */
    public function startUserAuth($streamId){

        $this->render = false;

        $this->autoRender = false;

        if (!$this->Auth->user()){
            $this->Session->setFlash('You need to be logged in, to access this page', 'flash-failure');
        }
        $this->Stream->id = $streamId;

        if (!$this->Stream->exists()) {
            $this->invalidParameter();
        }

        $stream = $this->Stream->find('all', array(
            'conditions' => array(
                'Stream.id' => $this->Stream->id,
            ),
        ));

        $streamData = $stream[0]['Stream'];

        $this->Session->write('stream_data', $streamData);

        $client = $this->createClient($streamData['consumer_key'], 
            $streamData['consumer_secret']
        );

        $requestToken = $client->getRequestToken(
            $streamData['request_token_url']
        );

        if ($requestToken) {
            $this->Session->write('request_token', $requestToken);
            $this->redirect($streamData['authorize_url'] . '?oauth_token=' . 
                $requestToken->key
            );
        } else {
            $this->Session->setFlash(__('Unable to retrieve request token'),
                'flash-failure'
            );
        }
    }

/**
 * Callback de la autenficiacion del usuario con el provedor
 *
 *
 */
    public function recieveUserAuth(){

        $this->render = false;

        $this->autoRender = false;

        $requestToken = $this->Session->read('request_token');
        $streamData   = $this->Session->read('stream_data');

        $client = $this->createClient($streamData['consumer_key'], 
            $streamData['consumer_secret']
        );

        $accessToken = $client->getAccessToken($streamData['access_token_url'],
            $requestToken
        );

        if ($accessToken) {

            $data = array(
                'StreamsUser' => array(
                    'users_id'      => $this->Auth->user('id'),
                    'streams_id'    => $streamData['id'],
                    'access_key'    => $accessToken->key,
                    'access_secret' => $accessToken->secret,
                ),
            );

            if ($this->StreamsUser->save($data)) {
                $this->Session->setFlash(__('Your stream has been saved'),
                    'flash-success'
                );
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Your stream could not be saved. Please, try again.'), 'flash-failure'
                );
                $this->redirect(array('action' => 'index'));
            }
        } else {
            $this->Session->setFlash(__('Unable to retrieve your token. Please, try again.'), 'flash-failure'
            );
            $this->redirect(array('action' => 'index'));
        }
    }

    private function createClient($consumerKey, $consumerSecret) {
        return new OAuthClient($consumerKey, $consumerSecret);
    }


}
