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
	public $uses = array('News', 'Video', 'Gallery');

/**
 * Displays a view
 *
 * @param none
 *
 * @return void
 */
	public function index() {
		$featuredNews = $this->News->find('all', array(
			'conditions' => array(
				'News.featured' => '1'
			),
			'order' => 'News.id DESC',
			'limit' => 5,
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

		// Seteamos las variables
		$this->set('featuredNews' , $featuredNews);
		$this->set('latestVideos', $latestVideos);
		$this->set('featuredVideo', $featuredVideo);
		$this->set('latestNews', $latestNews);
		$this->set('latestGalleries', $latestGalleries);

	}

}
