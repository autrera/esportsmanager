<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
/**
 * Operaciones a realizar antes de guardar en cualquier modelo que herede
 * de AppModel
 *
 * @param none
 * @return void
 */
    public function beforeSave($options = Array()) {
        if (isset($this->data[$this->alias]['created'])) {
            $this->data[$this->alias]['created'] = date('c');
        }
        return true;
    }

/**
 * Verifica que el archivo haya sido subido exitosamente
 *
 * @param array El array que forma el html helper del archivo subido
 * @return boolean true, si fue exitoso. Falso si no se subió el archivo
 */
    public function isUploadedFile($params) {
        if ((isset($params['error']) && $params['error'] == 0) ||
            (!empty( $params['tmp_name']) && $params['tmp_name'] != 'none')
        ) {
            return is_uploaded_file($params['tmp_name']);
        }
        return false;
    }

/**
 * Obtenemos la extension del archivo enviado
 *
 * @param $name String El nombre del archivo con su extensión
 * @return $ext String La extensión del archivo
 */
    public function getExtension($name){
        $array = explode(".", $name);
        return array_pop($array);
    }

/**
 * Verificamos que el usuario sea dueño del elemento
 *
 * @param $user     El usuario a verificar
 * @param $elemento El elemento a verificar
 */
    public function isOwnedBy($elemento, $user) {
        if ($elemento && $user){
            return $this->field('id', array('id' => $elemento, 'users_id' => $user)) === $elemento;
        } else {
            return false;
        }
    }

/**
 *
 *
 *
 */
    public function saveWithOptionalFile($request, $session,
        $optionsArray = array()
    ){
        // Seteamos los defaults
        $defaults = array(
            'fileInputName' => 'upload',
            'fileColumnName' => 'url',
            'fileOptional' => true,
        );
        // Sobreescribimos los defaults con los enviado por el user
        extract(array_merge($defaults, $optionsArray));
        // Pasamos los datos de la imagen a variables
        extract($request->data[$this->alias][$fileInputName]);
        // Checamos que haya sido subida y que sea segura (yeah right!)
        if (   $this->isUploadedFile(
                    $request->data[$this->alias][$fileInputName]
               )
            && $this->isFileValidType(
                    $request->data[$this->alias][$fileInputName]
               )
            && $this->isFileValidExtension($this->getExtension($name))
        ) {
            // Obtenemos extension de la imagen
            $ext = $this->getExtension($name);
            // Creamos un nuevo nombre unico para el archivo
            $newName = uniqid() . '.' . $ext;
            // Seteamos la ruta del archivo
            $fileURL    = $this->getStorageURL()  . $newName;
            $fileFolder = $this->getWebrootPath() . $fileURL;
            // Cambiamos el array de data, el campo thumbnail
            // es un varchar en la BD, no podemos dejar el tipo
            // file, seteamos la ruta de donde quedó el fichero
            $request->data[$this->alias][$fileColumnName] = $fileURL;
            // Antes de hacer el guardado, debemos checar si es edicion
            $previousFile = '';
            if ($request->params['action'] == 'edit'){
                // Es edición, debemos tomar el archivo previo y eliminarlo
                $previousFile = $this->read($fileColumnName);
                $previousFile = $this->getWebrootPath() . $previousFile[$this->alias][$fileColumnName];
                // Ya tenemos el archivo, pero lo borraremos sólo si se sube
                // otro archivo exitosamente
            }
            // Guardamos
            if ($this->save($request->data)) {
                // Movemos el archivo a su carpeta final
                if (move_uploaded_file($tmp_name, $fileFolder)){
                    // Archivo nuevo subido con éxito, borramos el anterior
                    $this->eraseFile($previousFile);
                    // Resizeamos la imagen
                    include("../Lib/resize.php");
                    $resizeObj = new resize($fileFolder);
                    if ($resizeObj -> resizeImage(620, 350, 'crop')) {
                        if ($resizeObj -> saveImage($fileFolder, 100)){
                            $session->setFlash(__('The ' . $this->alias . ' has been saved'), 'flash-success');
                            return true;
                        } else {
                            $session->setFlash(__('The ' . $this->alias . ' has been saved but the uploaded file could not be resized, upload the image again'), 'flash-warning');
                            return true;
                        }
                    }
                    $session->setFlash(__('The ' . $this->alias . ' has been saved'), 'flash-success');
                    return true;
                } else {
                    $session->setFlash(__('The ' . $this->alias . ' has been saved but the uploaded file could not, upload the image again'), 'flash-warning');
                    return true;
                }
            } else {
                $session->setFlash(__('The ' . $this->alias . ' could not be saved. Please, try again.'), 'flash-failure');
                return false;
            }
        } else if ($fileOptional) {
            // No se subió la imagen, pero es opcional, así que guardamos
            if ($this->save($request->data)) {
                $session->setFlash(__('The ' . $this->alias . ' has been saved'), 'flash-warning');
                return true;
            } else {
                $session->setFlash(__('The ' . $this->alias . ' could not be saved. Please, try again.'), 'flash-failure');
                return false;
            }
        } else {
            $session->setFlash(__('The ' . $this->alias . ' could not be saved. Please, try again.'), 'flash-failure');
            return false;
        }
    }

    public function saveWithFiles($request, $session,
        $optionsArray = array()
    ){
        // Seteamos los defaults
        $defaults = array(
            'files' => array(
                'fileOptional' => true,
            ),
        );
        // Sobreescribimos los defaults con los enviado por el user
        extract(array_merge($defaults, $optionsArray));

        foreach ($files as $file){
            // Extraemos los datos del archivo
            extract($file);
            // Pasamos los datos de la imagen a variables
            extract($request->data[$this->alias][$fileInputName]);
            // Obtenemos extension de la imagen
            $ext = $this->getExtension($name);
            // Seteamos la ruta del archivo
            $fileFolder = $this->getStorageDir() . uniqid() . "." .$ext;
            // Cambiamos el array de data, el campo thumbnail
            // es un varchar en la BD, no podemos dejar el tipo
            // file, seteamos la ruta de donde quedó el fichero
            $request->data[$this->alias][$fileColumnName] = $fileFolder;
            // Antes de hacer el guardado, debemos checar si es edicion
            if ($request->params['action'] == 'edit'){
                // Es edición, debemos tomar el archivo previo y eliminarlo
                $previousFile = $this->read($fileColumnName);
                $previousFile = $previousFile[$this->alias][$fileColumnName];
                // Ya tenemos el archivo, pero lo borraremos sólo si se sube
                // otro archivo exitosamente
            }
            // Checamos que haya sido subida
            if ($this->isUploadedFile(
                $request->data[$this->alias][$fileInputName])
            ) {
                // Todova bien
            } else if ($fileOptional) {
                // No se subió la imagen, pero es opcional, así que guardamos
            } else {
                $session->setFlash(__('The ' . $this->alias . ' could not be saved. Please, try again.'), 'flash-failure');
                return false;
            }
        }
        // Guardamos
        if ($this->save($request->data)) {
            // Movemos el archivo a su carpeta final
            if (move_uploaded_file($tmp_name, $fileFolder)){
                // Archivo nuevo subido con éxito, borramos el anterior
                $this->eraseFile($previousFile);
                $session->setFlash(__('The ' . $this->alias . ' has been saved'), 'flash-success');
            } else {
                $session->setFlash(__('The ' . $this->alias . ' has been saved but the uploaded file could not, upload the image again'), 'flash-warning');
            }
        } else {
            $session->setFlash(__('The ' . $this->alias . ' could not be saved. Please, try again.'), 'flash-failure');
        }
    }

    public function eraseFile($file){
        if (is_file($file)){
            unlink($file);
        }
    }

    // {{{ isResourceOwner()

    /**
     * Validación de si el usuario es dueño del recurso
     *
     * Checamos que sea dueño del recurso para editarlo o borrarlo
     *
     * @param String    $action_name      La acción realizada
     * @param String    $resource_id      El id del recurso
     * @param String    $user_id          El id del usuario
     *
     * @return boolean  true si el usuario es dueño del recurso
     *                  y la acción realizada es borrar o editar
     *                  false si no lo es
     */
    public function isResourceOwner($action_name, $resource_id, $user_id){
        // Verificamos que el model tenga campo de usuarios
        if ($this->hasField('users_id')){
            // Verificamos que sea una edicion, borrado o que exista el recurso
            if (in_array($action_name, array('delete', 'edit')) && $resource_id
            ){
                if ($this->isOwnedBy($resource_id, $user_id)){
                    return true;
                }
            }
        }
        return false;
    }

    // }}}

    // {{{ getStorageDir()

    /**
     * Retornamos el path explicito hacia nuestro webroot
     *
     * @param none
     * @return String El path a la carpeta de webroot
     */
    public function getWebrootPath(){
        return ROOT . DS . APP_DIR . DS . WEBROOT_DIR;
    }

    // }}}

    // {{{ getStorageURL()

    /**
     * Retornamos el path de la URL del archivo
     *
     * @param none
     * @return String El path a la carpeta de alamacenamiento
     */
    public function getStorageURL(){
        return DS . 'uploads' . DS . $this->table . DS;
    }

    // }}}

    // {{{ deleteWithFile()

    /**
     * Borra registros de la BD y el archivo respectivo
     *
     * @param Int $id El id del recurso a eliminar
     * @param String $fileField El nombre del campo que contiene al archivoo
     * @param Object $session El objeto de sesión para setear mensajes
     *
     * @return boolean
     */
    public function deleteWithFile($id, $fileField, $session){
        $this->id = $id;
        if ($this->exists()){
            $file = $this->field($fileField);
            $filePath = $this->getWebrootPath() . $file;
            if ($this->delete($id)){
                if (is_file($filePath)){
                    unlink($filePath);
                    $session->setFlash('The resource and file were deleted',
                        'flash-success'
                    );
                    return true;
                }
                $session->setFlash('The delete, was successful',
                    'flash-success'
                );
                return true;
            }
            $session->setFlash('Unable to delete the resource',
                'flash-failure'
            );
            return false;
        }
        $session->setFlash('Unable to find the resource to delete.',
            'flash-failure'
        );
        return false;
    }

    // }}}

    /// {{{ isFileValidType()

    /**
     * Verifica que el archivo subido sea una imagen segura
     *
     * @param Array $params Array de los parametros del archivo
     *
     * @return boolean True si el archivo tiene un mime válido, falso de lo
     *                 contrario
     */
    function isFileValidType($params){
        // El nombre temporal de archivo
        $file = $params['tmp_name'];

        // Los mime tipes permitidos
        $whitelist = array(
            'image/jpeg',
            'image/png',
            'image/gif',
        );

        // Obtenemos los atributos de la imagen, solo el tipo nos importa
        $imageData = getimagesize($file);

        // Verificamos que sea válido
        if (in_array($imageData['mime'], $whitelist)){
            return true;
        } else {
            return false;
        }
    }

    // }}}

    /// {{{ isFileValidExtension($ext)

    /**
     * Verifica que el archivo subido tenga una extensión segura
     *
     * @param String $ext La extensión del archivo
     *
     * @return boolean True si el archivo tiene una extensión válida, falso de
     *                 lo contrario
     */
    function isFileValidExtension($ext){

        // Los mime tipes permitidos
        $whitelist = array(
            'jpg', 'gif', 'png'
        );

        // Verificamos que sea válido
        if (in_array($ext, $whitelist)){
            return true;
        } else {
            return false;
        }
    }

    // }}}

    // {{{ increaseCounter()

    public function increaseCounter(){
        $counter = $this->field('counter');
        $counter++;
        $this->saveField('counter', $counter);
    }

    // }}}

}
