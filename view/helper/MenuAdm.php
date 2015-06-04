<?php

namespace NewsPucpr;

use \Route;

class MenuAdm
{
    public static function create()
    {

        $myRoute = Route::getInstance();

        $html = '';
        $html .= sprintf(
                    '<li %s><a href="%s">Overview <span class="sr-only">(current)</span></a></li>'
                    ,in_array($myRoute->getMatchedRouteName(),array('administracao')) ? 'class="active"' : ''
                    ,$myRoute->createLink('administracao',array())
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