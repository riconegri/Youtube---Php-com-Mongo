<?php

/**
 * Library of array functions for Cake.
 *
 * PHP 5
 *
 *Funcoes que um dia foram uteis
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
require_once 'Set.php';

class Reserva extends Set {

    /**
     *conecta ao browser id 
     */
    public function connectBid() {

        $_POST['audience'] = $this->audience;

        $fields_string = http_build_query($_POST);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($this->cert_path) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
            curl_setopt($ch, CURLOPT_CAINFO, $this->cert_path);
        }
        $this->auth = curl_exec($ch);
        $this->error = curl_errno($ch);
        if ($this->error > 0) {
            $erro = curl_error($ch);
        }
        curl_close($ch);

        if (isset($erro))
            $this->auth = array('error' => $erro);
        else {
            $this->auth = json_decode($this->auth, true);
            $this->createSession();
        }
    }
}
