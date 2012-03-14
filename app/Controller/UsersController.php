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
	public $uses = array('User', 'Profile', 'Avatar', 'Country');

/**
 * Agrega usuarios
 *
 * @param mixed What page to display
 */
	public function add() {
		$paises  = $this->Country->find('list');
		$avatars = $this->Avatar->find('list');
    	$this->set(compact('paises', 'avatars'));
	    if (!empty($this->request->data)) {
	        // We can save the User data:
	        // it should be in $this->request->data['User']

	        $user = $this->User->save($this->request->data);

	        // If the user was saved, Now we add this information to the data
	        // and save the Profile.

	        if (!empty($user)) {
	            // The ID of the newly created user has been set
	            // as $this->User->id.
	            $this->request->data['Profile']['users_id'] = $this->User->id;
		    	echo "<pre>";
		    	print_r($this->request->data);
		    	echo "</pre>";

	            // Because our User hasOne Profile, we can access
	            // the Profile model through the User model:
	            $this->Profile->save($this->request->data);
	        }
	    }
	}
}
