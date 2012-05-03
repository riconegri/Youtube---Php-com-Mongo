<?php

/**
 * Library of array functions for Cake.
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
 * @package       Cake.Utility
 * @since         CakePHP(tm) v 1.2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
require_once 'Set.php';

class MongoOrm extends Set {

    public function loadUser($model = 'users', $options = array()) {
        $_options = array(
            'actions' => array(
                'metodo' => array(
                    'type'=>'find',
                    'where' => array(),
                ),
            )
        );
        $options = Set::merge($_options, $options);
        try {
            $conn = new Mongo('localhost');

            $db = $conn->{$model};
            $collection = $db->{$model};
            foreach ($options['actions'] as $action) {
                $res[] = $collection->{$action['type']}($action['where']);
            }
            $conn->close();
            return $res;
            //$this->U->remove(array('email'=>'{'));
            //prMongo($this->U->find());
        } catch (MongoConnectionException $e) {
            die('Error connecting to MongoDB server');
        } catch (MongoException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}
