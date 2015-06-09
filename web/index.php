<?php
/**
 * BOOTSTRAP da aplicação
 *
 * Todas as requisições passam por este arquivo
 *
 * Utilizo fortemente URLs Amigáveis
 * Não esquecer de configurar o VIRTUAL HOST no apache e verificar o .htaccess
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type:text/html; charset=UTF-8');
session_start();

define('APP_DIR_CORE','../core/');
define('APP_DIR_CONTROLLER','../controller/');
define('APP_DIR_MODEL','../model/');
define('APP_DIR_VIEW_HELPER','../view/helper/');
define('APP_DIR_LIBRARY','../library/');


/*// Carregamento de classes
require_once('../core/Conn.php');
require_once('../core/Application.php');
require_once('../controller/NoticiaController.php');
require_once('../model/Noticia.php');
require_once('../model/NoticiaDAO.php');
require_once('../view/helper/TabelaNoticias.php');
require_once('../view/helper/ListaNoticias.php');
require_once('../view/helper/LeituraNoticia.php');

require_once('../controller/UsuarioController.php');
require_once('../model/Usuario.php');
require_once('../model/UsuarioDAO.php');
require_once('../view/helper/TabelaUsuarios.php');
require_once('../view/helper/MenuAdm.php');

// Library
require_once('../library/Util.php');
require_once('../library/AccessDeniedException.php');*/

// Autoloader de classes
// Sempre que uma classe for utilizada e o PHP
// não encontrar sua definição, esta função será chamada
function __autoload($classname) {

    // Como uso namespaces
    // Preciso tratar o nome completo da classe
    $cortes = explode('\\', $classname);
    $classname = end($cortes);

    if(file_exists(APP_DIR_CORE . "$classname.php"))
        require_once APP_DIR_CORE . "$classname.php";
    if(file_exists(APP_DIR_CONTROLLER . "$classname.php"))
        require_once APP_DIR_CONTROLLER . "$classname.php";
    if(file_exists(APP_DIR_MODEL . "$classname.php"))
        require_once APP_DIR_MODEL . "$classname.php";
    if(file_exists(APP_DIR_VIEW_HELPER . "$classname.php"))
        require_once APP_DIR_VIEW_HELPER . "$classname.php";
    if(file_exists(APP_DIR_LIBRARY . "$classname.php"))
        require_once APP_DIR_LIBRARY . "$classname.php";

}

// Classe responsável pelas URLs Amigáveis e Roteamento
// https://github.com/jonasruth/php-simple-routing
require_once('../library/php-simple-routing/lib/Route.class.php');

// Definição das regras de URL
// Possibilita a formação de URLs Amigáveis
// Crio rotas e regras
$routeList = array(
    // GERAL
    'startpage' => array(
        'rule' => '/',
        'action' => '../view/startpage.php',

    ),
    'leitura' => array(
        'rule' => '/leitura/{id}/{titulo_slug}',
        'action' => '../view/noticia_leitura.php',
        'params' => array(
            'id' => array('pattern' => '\d+',),
            'titulo_slug' => array('pattern' => '[a-z0-9-_]+'),
        ),
    ),
    // ADM
    'login' => array(
        'rule' => '/login',
        'action' => '../view/autenticacao.php',
    ),
    'logout' => array(
        'rule' => '/logout',
        'action' => '../view/logout.php',
    ),
    'administracao' => array(
        'rule' => '/administracao',
        'action' => '../view/administracao.php',
    ),
    // ADM NOTICIAS
    'ger_noticias' => array(
        'rule' => '/administracao/noticias',
        'action' => '../view/noticia_list.php',
    ),
    'new_noticia' => array(
        'rule' => '/administracao/noticias/new',
        'action' => '../view/noticia_new.php',
    ),
    'edt_noticia' => array(
        'rule' => '/administracao/noticias/edit/{id}',
        'action' => '../view/noticia_edit.php',
        'params' => array(
            'id' => array('pattern' => '\d+',),
        ),
    ),
    'del_noticia' => array(
        'rule' => '/administracao/noticias/delete/{id}',
        'action' => '../view/noticia_del.php',
        'params' => array(
            'id' => array('pattern' => '\d+',),
        ),
    ),
    'del_noticia_ajx' => array(
        'rule' => '/administracao/noticias/delete',
        'action' => '../view/noticia_del_ajx.php',
    ),
    'salvar_noticia' => array(
        'rule' => '/administracao/noticias/salvar',
        'action' => '../view/noticia_save.php',
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

define('ACESSO_ESCRITOR', 'E');
define('ACESSO_ADMINISTRADOR', 'A');

// Definições do controle de acesso
// Aqui digo qual o acesso o usuário precisa
// ter para acessar cada rota
$controleAcesso = array(
    // GERAL
    'startpage' => array(),
    'leitura' => array(),
    // ADM
    'login' => array(),
    'logout' => array(),
    'administracao' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    // ADM NOTICIAS
    'ger_noticias' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    'new_noticia' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    'edt_noticia' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    'del_noticia' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    'del_noticia_ajx' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    'salvar_noticia' => array(ACESSO_ESCRITOR, ACESSO_ADMINISTRADOR),
    // ADM USUARIOS
    'ger_usuarios' => array(ACESSO_ADMINISTRADOR),
    'new_usuario' => array(ACESSO_ADMINISTRADOR),
    'edt_usuario' => array(ACESSO_ADMINISTRADOR),
    'del_usuario' => array(ACESSO_ADMINISTRADOR),
    'del_usuario_ajx' => array(ACESSO_ADMINISTRADOR),
    'salvar_usuario' => array(ACESSO_ADMINISTRADOR),
);

use JonasRuth\NewsPucpr\Application;
use JonasRuth\NewsPucpr\AccessDeniedException;
use JonasRuth\PhpSimpleRoute\Route;
use JonasRuth\PhpSimpleRoute\RouteNotFoundException;

$app = Application::getInstance()
    ->setProtocol("http")
    ->setDomain("news.pucpr.br")
    ->setBasedir("/");

try {

    $myRoute = Route::getInstance()
        ->setConfig($app->getDomain(), $app->getBasedir(), $app->getProtocol())
        ->setRouteList($routeList)
        ->init($_SERVER['REQUEST_URI'])
        ->check();

    $meuAcesso = null;
    if (\JonasRuth\NewsPucpr\UsuarioController::isLogged()) {
        $meuAcesso = \JonasRuth\NewsPucpr\UsuarioController::getLogged()['tipo'];
    }
    $acessoNecessario = $controleAcesso[$myRoute->getMatchedRouteName()];

    if (empty($acessoNecessario)) { // Se não for necessário permissão de acesso
        include $myRoute->getMatchedRouteAction(); // Vai para destino
    } else {
        if (!empty($acessoNecessario)) { // Se for necessário permissão de acesso
            if (!empty($meuAcesso)) { // Se o usuário já estiver logado
                if (in_array($meuAcesso, $controleAcesso[$myRoute->getMatchedRouteName()])) {
                    include $myRoute->getMatchedRouteAction();
                } else {
                    throw new AccessDeniedException('Acesso não permitido.');
                }
            } else { // Pedir login
                include '../view/autenticacao.php';
            }
        }
    }
    exit(0);
} catch (RouteNotFoundException $e) {
    include '../view/route-not-found.php';
} catch (AccessDeniedException $e) {
    include '../view/access-denied.php';
}