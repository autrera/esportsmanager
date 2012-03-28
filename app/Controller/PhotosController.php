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
        // TODO
        // Validar que sólo el autor de la galeria pueda agregar fotos
        // Checar que las fotos se hayan subido bien
        // Mover las fotos
        // No dejar ver esta action si no hay $Id de galeria

        // Checamos que esté logueado
        if ($this->Auth->user('id')){
            // Checamos que venga de un post
    		if ($this->request->is('post')) {
                // Seteamos la galeria a la que se estará agregando la photo
                $this->request->data['galleries_id'] = $id;
                // Seteamos el usuario que está haciendo el guardado
                $this->request->data['users_id'] = $this->Auth->user('id');
                // Formateamos el request data
                $this->request->data = $this->Photo->formatearMultiUpload(
                    $this->request->data
                );
                foreach ($this->request->data as $row){
                    $this->Photo->create();
                    // Pasamos los datos de la imagen a variables
                    extract($row['Photo']['upload']);
                    // Checamos que haya sido subida
                    if ($this->Photo->isUploadedFile(
                        $row['Photo']['upload'])
                    ) {
                        // Obtenemos extension de la imagen
                        $ext = $this->Photo->getExtension($name);
                        // Seteamos la ruta del archivo
                        $fileFolder = $this->Photo->getStorageDir() . uniqid() . "." .$ext;
                        // Cambiamos el array de data, el campo thumbnail
                        // es un varchar en la BD, no podemos dejar el tipo
                        // file, seteamos la ruta de donde quedó el fichero
                        $row['Photo']['url'] = $fileFolder;
                        // Guardamos
                        if ($this->Photo->save($row)) {
                            // Movemos el archivo a su carpeta final
                            if (move_uploaded_file($tmp_name, $fileFolder)){
                                // $this->Session->setFlash(__('The game has been saved'));
                            } else {
                                // $this->Session->setFlash(__('The game has been saved but the image could not, upload the image again'));
                            }
                        } else {
                            // $this->Session->setFlash(__('The game could not be saved. Please, try again.'));
                        }
                    } else {
                        // No se subió la imagen
                        // $this->Session->setFlash(__('There was an error trying to upload the file, please try again'));
                    }
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
