<?php
/**
 * liberdade para utilizar a estrutura para varios websites no mesmo servidor.
 * Ex. localhost carrega YoutubeController, ex. aquisim.com.br carrega o AquiController, 
 * que pode ser uma nova estrutura de site, com template, layout, views
 */
$controller = $_SERVER['HTTP_HOST'] == 'localhost' ? 'youtube' : 'youtube';
require_once "controllers/{$controller}_controller.php";
$humanize_controller = ucfirst($controller) . 'Controller';
new $humanize_controller();
