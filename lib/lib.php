<?php

require_once 'basics.php';

class lib extends basics {

    protected function render($variables_array = null) {
        $this->required('views/helpers', 'app_helper');
        $this->pathsTemplate();
        if ($variables_array)
            extract($variables_array);
        //echo PAGES . $this->view . ".php";die;
        ob_start();
        require_once PAGES . $this->view . ".php";
        $this->view_html = ob_get_contents();
        ob_clean();
        require(LAYOUT . $this->layout . ".php");
    }

    protected function block($name = false) {
        if (!$name)
            echo 'Bloco sem nome!';
        $b = BLOCKS . $name . '.php';
        if (is_file($b))
            require_once $b;
        else
            echo "Bloco não encontrado:$b";
    }

    public function isAjax() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        } else {
            return false;
        }
    }

}
?>