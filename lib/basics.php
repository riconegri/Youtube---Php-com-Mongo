<?php

function pr($arr = array(), $die = true) {
    echo '<pre>';
    if (!$arr)
        var_dump($arr);
    else
        print_r($arr);
    echo '</pre>';
    if ($die)
        die();
}

function prMongo($collection, $die = true) {
    foreach ($collection as $obj) {
        pr($obj, false);
    }
    if ($die) {
        die('Fim');
    }
}

function required($tipo, $path) {
    $p = ROOT . $tipo . DS . $path . '.php';
    if (is_file($p)) {
        require_once $p;
    }else
        echo "<p>Arquivo não encontrado: {$p}</p>";
}

class basics {

    public $webroot = 'testes';
    public $template = 'default';
    public $base_path = '';
    public $web_static = '';
    public $js = '';
    public $css = '';
    public $img = '';
    public $layout = 'default';
    public $view = 'index';

    public function __construct() {
        session_start();
        define('DS', DIRECTORY_SEPARATOR);
        define('FOLDER_ROOT', 'interage');
        define('ROOT', $_SERVER['DOCUMENT_ROOT'] . FOLDER_ROOT . DS);
        $this->webroot = FOLDER_ROOT . '/';
//LOAD INFOS DO USER
        $this->required('models', 'bid');
        require_once ROOT . 'models/bid.php';
        $this->bid = new bid();
    }

    public function pathsTemplate() {
        define('ROOT_TEMPLATE', ROOT . 'views' . DS . 'template' . DS . $this->template . DS);
        define('PAGES', ROOT_TEMPLATE . 'pages' . DS);
        define('LAYOUT', ROOT_TEMPLATE . 'layout' . DS);
        define('BLOCKS', ROOT_TEMPLATE . 'blocks' . DS);

        $this->base_path = 'http://' . $_SERVER['HTTP_HOST'] . '/' . FOLDER_ROOT . '/';
        $this->web_static = $this->base_path . 'assets/' . $this->template . '/';
        $this->css = $this->web_static . 'css/';
        $this->js = $this->web_static . 'js/';
        $this->img = $this->web_static . 'img/';
    }

//HELPERS
    public function js($file = false) {
        return $this->js . str_replace('.js', '', $file) . '.js';
    }

    public function css($file = false) {
        return $this->css . str_replace('.css', '', $file) . '.css';
    }

    public function img() {
        echo $this->img . $file;
    }

    /*
     * Carrega as classes desejadas
     */

    public function required($tipo, $path) {
        $p = ROOT . $tipo . DS . $path . '.php';
        if (is_file($p)) {
            require_once $p;
        }else
            echo "<p>Arquivo não encontrado: {$p}</p>";
    }

}

?>