<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type:text/html; charset=UTF-8');

// Carregamento de classes
require_once('../core/Conn.php');
require_once('../core/Application.php');
require_once('../controller/NoticiaController.php');
require_once('../controller/UsuarioController.php');
require_once('../model/Usuario.php');
require_once('../model/UsuarioDAO.php');
require_once('../view/helper/ListarUsuario.php');
require_once('../view/helper/TabelaUsuarios.php');
require_once('../view/helper/MenuAdm.php');

// https://github.com/jonasruth/php-simple-routing
require_once('../library/php-simple-routing/lib/Route.class.php');

// Definição das regras de URL
$rulelist = array(
    // GERAL
    'startpage' => array(
        'rule' => '/',
        'action' => '../view/startpage.php',
    ),
    // ADM
    'administracao' => array(
        'rule' => '/administracao',
        'action' => '../view/administracao.php',
    ),
    // ADM NOTICIAS
    'ger_noticias' => array(
        'rule' => '/administracao/noticias',
        'action' => '../view/noticia_list.php',
    ),
    // ADM USUARIOS
    'ger_usuarios' => array(
        'rule' => '/administracao/usuarios',
        'action' => '../view/usuario_list.php',
    ),
    'new_usuario' => array(
        'rule' => '/administracao/usuarios/new',
        'action' => '../view/usuario_new.php',
    ),
    'edt_usuario' => array(
        'rule' => '/administracao/usuarios/edit/{id}',
        'action' => '../view/usuario_edit.php',
        'params' => array(
            'id' => array('pattern' => '\d+',),
        ),
    ),
    'del_usuario' => array(
        'rule' => '/administracao/usuarios/delete/{id}',
        'action' => '../view/usuario_del.php',
        'params' => array(
            'id' => array('pattern' => '\d+',),
        ),
    ),
    'del_usuario_ajx' => array(
        'rule' => '/administracao/usuarios/delete',
        'action' => '../view/usuario_del_ajx.php',
    ),
    'salvar_usuario' => array(
        'rule' => '/administracao/usuarios/salvar',
        'action' => '../view/usuario_save.php',
    ),
);

use NewsPucpr\Application;
$app = Application::getInstance()
    ->setProtocol("http")
    ->setDomain("news.pucpr.br")
    ->setBasedir("/");

try {

    $myRoute = Route::getInstance()
        ->setConfig($rulelist, $app->getDomain(), $app->getBasedir(), $app->getProtocol())
        ->init($_SERVER['REQUEST_URI'])
        ->check();

    include $myRoute->getMatchedRouteAction();

} catch (RouteNotFoundException $e) {

    include '../view/route-not-found.php';

}