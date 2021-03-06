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
	public $uses = array('Photo', 'Gallery');

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
            $this->Gallery->id = $id;
            // Verificamos que el recurso exista
            if (!$this->Gallery->exists()) {
                $this->invalidParameter();
            }
            // Checamos que venga de un post
    		if ($this->request->is('post')) {
                // Deshabilitamos el rendereo de la vista
                $this->render = false;

                // Habilitamos el reporte de errores
                error_reporting(E_ALL | E_STRICT);

                App::uses('UploadHandler', 'Lib');

                $uploadDir = $this->Photo->getWebrootPath().'/uploads/photos/';
                $uploadUrl = '/uploads/photos';

                $upload_handler = new UploadHandler(array(
                    'upload_dir' => $uploadDir,
                    'upload_url' => $uploadUrl,
                    'image_versions' => array(
                        'resized' => array(
                            'upload_dir' => $uploadDir,
                            'upload_url' => $uploadUrl,
                            'max_width' => 620,
                            'max_height' => 500,
                            'jpeg_quality' => 85
                        ),
                    ),
                ));

                header('Pragma: no-cache');
                header('Cache-Control: no-store, no-cache, must-revalidate');
                header('Content-Disposition: inline; filename="files.json"');
                header('X-Content-Type-Options: nosniff');
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Methods: OPTIONS, HEAD, GET, POST, PUT, DELETE');
                header('Access-Control-Allow-Headers: X-File-Name, X-File-Type, X-File-Size');

                switch ($_SERVER['REQUEST_METHOD']) {
                    case 'OPTIONS':
                        break;
                    case 'HEAD':
                    case 'GET':
                        $upload_handler->get();
                        break;
                    case 'POST':
                        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
                            $upload_handler->delete();
                        } else {
                            $info = $upload_handler->post();
                        }
                        break;
                    case 'DELETE':
                        $upload_handler->delete();
                        break;
                    default:
                        header('HTTP/1.1 405 Method Not Allowed');
                }

                // Seteamos la galeria a la que se estará agregando la photo
                $this->request->data['galleries_id'] = $id;
                // Seteamos el usuario que está haciendo el guardado
                $this->request->data['users_id'] = $this->Auth->user('id');
                // Seteamos la url del archivo subido
                $this->request->data['url'] = $info[0]->url;
                // Resetamos
                $this->Photo->create();
                // Guardamos
                $this->Photo->save($this->request->data);
            } else {
                $this->layout = 'default_no_jquery';
                $this->set('galeria', $this->Gallery->field('name', array(
                    'Gallery.id' => $id
                )));
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
            if ($this->Photo->saveWithOptionalFile($this->request, $this->Session,
                array(
                    'fileColumnName' => 'url',
                    'fileInputName' => 'photo',
                )
            )){
                $this->redirect(array('action' => 'index'));
            }
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
        if ($this->Photo->deleteWithFile($id, 'url', $this->Session)) {
            $this->redirect(array('action' => 'index'));
        }
    }

}
