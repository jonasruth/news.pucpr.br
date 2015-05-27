<?php

namespace NewsPucpr;

use \Route;

class ListarUsuario
{
    public static function fromArray($arrUsuarios)
    {
        $html = sprintf('<li>%s</li>', "Lista de Usuários");
        $html .= '<ul>';

        foreach ($arrUsuarios as $item) {
            $html .= sprintf(
                '<li>%s <a href="%s">Editar</a> <a href="%s">Excluir</a></li>',
                $item->nome,
                Route::getInstance()->createLink('edt_usuario',array('id'=>$item->id)),
                Route::getInstance()->createLink('del_usuario',array('id'=>$item->id))
            );
        }

        $html .= '</ul>';

        return $html;
    }
}