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
    public function beforeSave() {
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

}
