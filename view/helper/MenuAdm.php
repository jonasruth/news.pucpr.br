<?php

namespace JonasRuth\NewsPucpr;

use JonasRuth\PhpSimpleRoute\Route;

/**
 * Class MenuAdm
 * @package JonasRuth\NewsPucpr
 */
class MenuAdm
{
    /**
     * Desenha um menu lateral para a área administrativa
     * @return string
     */
    public static function create()
    {

        $myRoute = Route::getInstance();

        $html = '';
        $html .= sprintf(
                    '<li %s><a href="%s">Seja Bem-Vindo <span class="sr-only">(current)</span></a></li>'
                    ,in_array($myRoute->getMatchedRouteName(),array('administracao')) ? 'class="active"' : ''
                    ,$myRoute->createLink('administracao')
                );
        $html .= sprintf(
                    '<li %s><a href="%s">Notícias</a></li>'
                    ,in_array($myRoute->getMatchedRouteName(),array('ger_noticias')) ? 'class="active"' : ''
                    ,$myRoute->createLink('ger_noticias',array())
                );
        $html .= sprintf(
                    '<li %s><a href="%s" > Usuários</a ></li>'
                    ,in_array($myRoute->getMatchedRouteName(),array('ger_usuarios','new_usuario','edt_usuario','del_usuario','salvar_usuario')) ? 'class="active"' : ''
                    ,$myRoute->createLink('ger_usuarios',array())
                );

        return $html;
    }
}