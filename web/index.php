<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type:text/html; charset=UTF-8');

// Carregamento de classes
require_once('../core/Conn.php');
require_once('../controller/NoticiaController.php');
require_once('../controller/UsuarioController.php');
require_once('../model/Usuario.php');
require_once('../model/UsuarioDAO.php');
require_once('../view/helper/ListarUsuario.php');

// https://github.com/jonasruth/php-simple-routing
require_once('../library/php-simple-routing/lib/Route.class.php');

// Definição das regras de URL
$rulelist = array(
    'startpage' => array(
        'rule' => '/',
        'action' => '../view/startpage.php',
    ),
    'ger_usuarios' => array(
        'rule' => '/usuarios',
        'action' => '../view/usuario_list.php',
    ),
    'new_usuario' => array(
        'rule' => '/usuarios/new',
        'action' => '../view/usuario_new.php',
    ),
    'edt_usuario' => array(
        'rule' => '/usuarios/edit/{id}',
        'action' => '../view/usuario_edit.php',
        'params' => array(
            'id' => array('pattern'=>'\d+',),
        ),
    ),
    'del_usuario' => array(
        'rule' => '/usuarios/delete/{id}',
        'action' => '../view/usuario_del.php',
        'params' => array(
            'id' => array('pattern'=>'\d+',),
        ),
    ),
    'salvar_usuario' => array(
        'rule' => '/usuarios/salvar',
        'action' => '../view/usuario_save.php',
    ),
);

$my_protocol = 'http';
$my_domain = 'news.pucpr.br';
$my_basedir = '/';

$my_url_prefix = $my_protocol . '://' . $my_domain . $my_basedir;

try {

    $myRoute = Route::getInstance()
        ->setConfig($rulelist, $my_domain, $my_basedir, $my_protocol)
        ->init($_SERVER['REQUEST_URI'])
        ->check();

    include $myRoute->getMatchedRouteAction();

} catch (RouteNotFoundException $e) {

    include '../view/route-not-found.php';

}