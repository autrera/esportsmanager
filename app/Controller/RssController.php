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
class RssController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Rss';

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html', 'Rss', 'Text');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Video', 'News', 'Post');

/**
 * Displays a all the rss feed
 *
 * @param none
 */
	public function index() {
        if ($this->RequestHandler->isRss() ) {
            $latestNews = $this->News->find('all', array(
                'order' => 'News.id DESC',
                'limit' => 10,
            ));

            $latestPosts = $this->Post->find('all', array(
                'order' => 'Post.id DESC',
                'limit' => 5,
            ));

            $latestVideos = $this->Video->find('all', array(
                'order' => 'Video.id DESC',
                'limit' => 5,
            ));
            // Seteamos las variables
            $this->set('latestPosts',  $latestPosts);
            $this->set('latestVideos', $latestVideos);
            $this->set('latestNews',   $latestNews);
        }
	}

}
