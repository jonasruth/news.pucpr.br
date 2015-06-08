<?php

namespace JonasRuth\NewsPucpr;

use JonasRuth\PhpSimpleRoute\Route;

class ListarUsuario
{
    public static function fromArray($arrUsuarios)
    {
        $html = sprintf('<li>%s</li>', "Lista de Usuários");
        $html .= '<ul>';

        foreach ($arrUsuarios as $item) {
            $html .= sprintf(
                '<li>%s <a href="%s">Editar</a> <a class="record-delete" href="%s" data-id="%s">Excluir</a></li>',
                $item->nome,
                Route::getInstance()->createLink('edt_usuario',array('id'=>$item->id)),
                Route::getInstance()->createLink('del_usuario',array('id'=>$item->id)),
                $item->id
            );
        }

        $html .= '</ul>';

        return $html;
    }
}