<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require('lib/lib.php');

class AppController extends lib {

    public function __construct() {
        parent::__construct();
        $this->page();
        $this->{$this->page}();
    }

    public function page() {
        if (isset($_GET['page']) && $_GET['page'] != '') {
            $action = $_GET['page'];
        } else {
            $action = 'index';
        }
        switch ($action) {
            case 'outro':
            case 'gold':
            case 'index':
            case 'bid':
            case 'rpc':
                $this->page = $action;
                break;
            default : 
                $this->page =  'index';
                $this->http_error = '404';
        }
    }

}

?>
