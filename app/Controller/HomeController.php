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
class HomeController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Home';

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
	public $uses = array('News', 'Video', 'Gallery', 'Stream', 'Post');

/**
 * Displays a view
 *
 * @param none
 *
 * @return void
 */
	public function index() {
        Cache::write('something', 'Aldo');
        echo Cache::read('something');
        if (Cache::read('featuredNews')) {
    		$featuredNews = $this->News->find('all', array(
    			'conditions' => array(
    				'News.featured' => '1'
    			),
    			'order' => 'News.id DESC',
    			'limit' => 5,
    		));
            Cache::write('featuredNews', $featuredNews);
        }

		$latestPosts = $this->Post->find('all', array(
			'order' => 'Post.id DESC',
			'limit' => 3,
		));

		$latestVideos = $this->Video->find('all', array(
			'order' => 'Video.id DESC',
			'limit' => 5,
		));

		$featuredVideo = array_shift($latestVideos);

		$latestNews = $this->News->find('all', array(
			'order' => 'News.id DESC',
			'limit' => 10,
		));

		$latestGalleries = $this->Gallery->find('all', array(
			'order' => 'Gallery.id DESC',
			'limit' => 2,
		));

		$liveStreams = $this->getLiveStreams();

		// Seteamos las variables
		$this->set('featuredNews' , Cache::read('featuredNews'));
		$this->set('latestPosts', $latestPosts);
		$this->set('latestVideos', $latestVideos);
		$this->set('featuredVideo', $featuredVideo);
		$this->set('latestNews', $latestNews);
		$this->set('liveStreams', $liveStreams);
		$this->set('latestGalleries', $latestGalleries);

	}

	// {{{ getLiveStreams()

	/**
	 * Obtenemos los streams registrados que están en vivo, ordenados por usuarios
	 *
	 * @param none
	 * @return Array $data Los datos de los streams
	 */
	private function getLiveStreams(){
		$limit = 3; // Limite de streams
        // Obtenemos los provedores de streaming y sus usuarios
        $streams = $this->Stream->find('all');
        // En esta variable almacenaremos todo lo que vamos a mandar a la view
        $data = array();
        // Por cada provedor de streaming
        foreach ($streams as $stream){
            // Obtenemos los datos del streaming
            $streamData = $stream['Stream'];
            // Pasamos los valores a nuestra variable
            $data[$streamData['name']]['streamData'] = $streamData;
            // Iniciamos el objeto para realizar las llamadas al API
            $client = $this->createClient($streamData['consumer_key'],
                $streamData['consumer_secret']
            );
            // Datos dummie, para testeo
            $users = array();
            $users[] = 'IPLLoL';
            $users[] = 'tsm_theoddone';
            $users[] = 'horusstv';
            $users[] = 'KungenTV';
            // Por cada usuario, obtenemos su identificador
            foreach ($stream['User'] as $user){
                $users[] = $user['StreamsUser']['identifier'];
            }
            // Hacemos la llamada para obtener el listado de canales
            $response = $client->get('', '', 'http://api.justin.tv/api/stream/list.json?limit='.$limit.'&channel='.implode(',', $users));
            // La respuesta es en JSON, decodificamos y pasamos a la var
            $data[$streamData['name']]['channels'] = json_decode($response);
        }
        // Enviamos el array
        return $data;
	}

	// }}}

}
