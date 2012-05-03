<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'app_controller.php';

class YoutubeController extends AppController {

    public $bid = false;

    public function index() {
        $var = '1st variable to use in a template';
        $var2 = '2nd variable to use in a template';
        if ($this->isAjax())
            $this->render(compact('var', 'var2'));
        

        if ($this->bid->isLogged()) {
            $this->template = 'fluid';
            $this->layout = 'fluid';
        } else {
            $this->template = 'twitter';
            $this->layout = 'bootstrap';
        }
        $this->view = 'gold';

        $this->render();
    }

    public function outro() {
        $var = '1st variable to use in a template';
        $var2 = '2nd variable to use in a template';
        if ($this->isAjax())
            $this->render(compact('var', 'var2'));

        $this->render();
    }

    public function gold() {

        $var = '1st variable to use in a template';
        $var2 = '2nd variable to use in a template';
        if ($this->isAjax())
            $this->render(compact('var', 'var2'));


        if ($this->bid->isLogged()) {
            $this->template = 'fluid';
            $this->layout = 'fluid';
            //$this->template = 'default';
            //$this->layout = 'default';
        } else {
            $this->template = 'twitter';
            $this->layout = 'bootstrap';
        }
        $this->view = 'gold';

        $this->render();
    }

    public function bid() {
        if (isset($_POST['logout']) && $_POST['logout']) {
            if ($this->bid->destroySession()) {
                return '1';
            }
        }
    }

    public function rpc() {
        $this->required('lib', 'rpc');
        $rpc = new rpc($this);
        die($rpc->result);
    }

}

?>
