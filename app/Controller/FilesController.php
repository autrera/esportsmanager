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

require_once '../Lib/imgResizer.php';

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 */
class FilesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Files';
    public $render = false;
    public $AutoRender = false;

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
	// public $uses = array('Video', 'Profile', 'User');

/**
 * Imprime el archivo dado
 *
 * @param int El id del Perfil a mostrar
 */
    public function view($table, $fileId, $width){
        $class = Inflector::classify($table);
        $this->uses = array($class);
        $path = $this->{$class}->field('url', array(
            $class.'.id' => $fileId
        ));
        $file = resize($path, array(
            'w' => $width 
        ));
        $type = 'image/jpeg';
        header('Content-Type:'.$type);
        header('Content-Length: ' . filesize($file));
        readfile($file);
    }

}
