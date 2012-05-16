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
class AvatarsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Avatars';

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
	public $uses = array('Avatar', 'Game');

/**
 * Muestra todos los avatares disponibles
 *
 * @param none
 */
    public function index() {
        $this->set('avatars', $this->Avatar->find('all'));
    }

/**
 * Damos de alta los juegos
 *
 * @param none
 */
	public function add(){
        // TODO
        // Validar que sea imagen
        // Validar que solo admins puedan mover esto

        // Checamos que esté logueado
        if ($this->Auth->user('id')){
            // Obtenemos los juegos de la BD
            $this->set('games', $this->Game->find('list'));
            // Checamos que venga de un post
            if ($this->request->is('post')) {
                // Formateamos el request data
                $this->request->data = $this->Avatar->formatearMultiUpload(
                    $this->request->data
                );
                foreach ($this->request->data as $row){
                    $this->Avatar->create();
                    // Pasamos los datos de la imagen a variables
                    extract($row['Avatar']['avatar']);
                    // Checamos que haya sido subida
                    if ($this->Avatar->isUploadedFile(
                        $row['Avatar']['avatar'])
                    ) {
                        // Obtenemos extension de la imagen
                        $ext = $this->Avatar->getExtension($name);
                        // Creamos un nuevo nombre unico para el archivo
                        $newName = uniqid() . '.' . $ext;
                        // Seteamos la ruta del archivo
                        $fileURL 
                            = $this->Avatar->getStorageURL() . $newName;
                        $fileFolder 
                            = $this->Avatar->getWebrootPath(). $fileURL;
                        // Cambiamos el array de data, el campo thumbnail
                        // es un varchar en la BD, no podemos dejar el tipo
                        // file, seteamos la ruta de donde quedó el fichero
                        $row['Avatar']['url'] = $fileURL;
                        // Guardamos
                        if ($this->Avatar->save($row)) {
                            // Movemos el archivo a su carpeta final
                            if (move_uploaded_file($tmp_name, $fileFolder)){
                                $this->Session->setFlash(__('The game has been saved'), 'flash-success');
                            } else {
                                $this->Session->setFlash(__('The game has been saved but the image could not, upload the image again'), 'flash-warning');
                            }
                            $this->redirect(array('action' => 'index'));
                        } else {
                            $this->Session->setFlash(__('The game could not be saved. Please, try again.'), 'flash-failure');
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
 * Visualiza el avatar dado
 *
 * @param int El id del Avatar a mostrar
 */
    public function view($id = null){
        $this->Avatar->id = $id;
        if (!$this->Avatar->exists()) {
            $this->invalidParameter();
        }
        $this->set('avatar', $this->Avatar->read(null, $id));
    }

/**
 * Edita el avatar
 *
 * @param int El id del avatar a editar
 */
    public function edit($id = null) {
        // Seteamos le id del avatar
        $this->Avatar->id = $id;

        // Verificamos que el recurso exista
        if (!$this->Avatar->exists()) {
            $this->invalidParameter();
        }

        // Obtenemos los juegos de la BD
        $this->set('games', $this->Game->find('list'));
        // Si la petición es get, buscamos en la base y lo enviamos
        if ($this->request->is('get')) {
            $this->request->data = $this->Avatar->read();
        } else {
            // Intentamos guardar el registro
            if ($this->Avatar->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'url',
                    'fileInputName' => 'avatar',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
        }
    }

/**
 * Elimina el avatar
 *
 * @param int El id del avatar a eliminar
 */
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        if ($this->Avatar->deleteWithFile($id, 'url', $this->Session)) {
            $this->redirect(array('action' => 'index'));
        }
    }

}
