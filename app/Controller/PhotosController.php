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
                    extract($row['Photo']['photo']);
                    // Checamos que haya sido subida
                    if ($this->Photo->isUploadedFile(
                        $row['Photo']['photo'])
                    ) {
                        // Obtenemos extension de la imagen
                        $ext = $this->Photo->getExtension($name);
                        // Creamos un nuevo nombre unico para el archivo
                        $newName = uniqid() . '.' . $ext;
                        // Seteamos la ruta del archivo
                        $fileURL    = $this->Photo->getStorageURL() . $newName;
                        $fileFolder = $this->Photo->getWebrootPath(). $fileURL;
                        // Cambiamos el array de data, el campo thumbnail
                        // es un varchar en la BD, no podemos dejar el tipo
                        // file, seteamos la ruta de donde quedó el fichero
                        $row['Photo']['url'] = $fileURL;
                        // Guardamos
                        if ($this->Photo->save($row)) {
                            // Movemos el archivo a su carpeta final
                            if (move_uploaded_file($tmp_name, $fileFolder)){
                                $this->Session->setFlash(__('The photo has been saved'), 'flash-success');
                            } else {
                                $this->Session->setFlash(__('The photo has been saved but the image could not, upload the image again'), 'flash-warning');
                            }
                            $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Session->setFlash(__('The photo could not be saved. Please, try again.'), 'flash-failure');
                        }
                    } else {
                        // No se subió la imagen
                        $this->Session->setFlash(__('There was an error trying to upload the file, please try again'), 'flash-failure');
                    }
                }
            }
        }
	}

/**
 * Visualiza la foto dada
 *
 * @param int El id de la foto a mostrar
 */
    public function view($id = null){
        $this->Photo->id = $id;
        if (!$this->Photo->exists()) {
            $this->invalidParameter();
        }

        $foto = $this->Photo->read(null, $id);

        $this->set('actions', $this->getAuthorizedActions());
        $this->set('isOwner', $this->Photo->isOwnedBy(
            $this->Photo->id, $this->Auth->user('id')
        ));

        $neighbors = $this->Photo->find('neighbors', array(
            'field' => 'id', 
            'value' => $this->Photo->id,
            'galleries_id' => $foto['Photo']['galleries_id']
        ));

        $this->set('vecinos', $neighbors);
        $this->set('id', $this->Photo->id);
        $this->set('foto', $foto);
    }

/**
 * Redirige hacia el index de galerias
 *
 * @param none
 * @return void
 */
    public function index(){
        $this->redirect(array(
            'controller' => 'galleries',
            'action' => 'index'
        ));
    }

/**
 * Edita la foto
 *
 * @param int El id de la foto a editar
 */
    public function edit($id = null) {
        // Seteamos le id de la foto
        $this->Photo->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Photo->exists()) {
            $this->invalidParameter();
        }

        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Photo->read();
        } else {
            // Intentamos guardar el registro
            $this->Photo->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'url',
                    'fileInputName' => 'photo',
                )
            );
        }
    }

/**
 * Elimina la foto
 *
 * @param int El id de la foto a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Photo->delete($id)) {
            $this->Session->setFlash('The photo with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }

}
