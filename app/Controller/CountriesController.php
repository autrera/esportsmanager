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
	// public $uses = array();

/**
 * Damos de alta los paises
 *
 * @param none
 */
	public function add(){
        // TODO
        // Validar que sea imagen
        // Validar que solo admins puedan mover esto

        // Checamos que esté logueado
        if ($this->Auth->user('id')){
            // Verificamos que sea un envio por POST
    		if ($this->request->is('post')) {
                $this->Country->create();
                // Pasamos los datos de la imagen a variables
                extract($this->request->data['Country']['flag']);
                // Checamos que haya sido subida
                if ($this->Country->isUploadedFile(
                    $this->request->data['Country']['flag'])
                ) {
                    // Obtenemos extension de la imagen
                    $ext = $this->Country->getExtension($name);
                    // Seteamos la ruta del archivo
                    $fileFolder = $this->Country->getStorageDir() . uniqid() . "." .$ext;
                    // Cambiamos el array de data, el campo thumbnail
                    // es un varchar en la BD, no podemos dejar el tipo
                    // file, seteamos la ruta de donde quedó el fichero
                    $this->request->data['Country']['flag'] = $fileFolder;
                    // Guardamos
        			if ($this->Country->save($this->request->data)) {
                        // Movemos el archivo a su carpeta final
                        if (move_uploaded_file($tmp_name, $fileFolder)){
                            $this->Session->setFlash(__('The country has been saved'));
                        } else {
                            $this->Session->setFlash(__('The country has been saved but the flag could not, upload the image again'));
                        }
                    } else {
                        $this->Session->setFlash(__('The game could not be saved. Please, try again.'));
                    }
                } else {
                    // No se subió la imagen
                    if ($this->Country->save($this->request->data)) {
                        $this->Session->setFlash(__('The country has been saved without flag'));
                    } else {
                        $this->Session->setFlash(__('The country could not be saved. Please, try again.'));
                    }
                }
            }
        }
	}

}
