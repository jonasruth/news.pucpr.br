<?php

namespace JonasRuth\NewsPucpr;

use JonasRuth\PhpSimpleRoute\Route;

/**
 * Class TabelaUsuarios
 * @package JonasRuth\NewsPucpr
 */
class TabelaUsuarios
{
    /**
     * Desenha uma tabela de usuarios para a area administrativa
     * @param $arrUsuarios
     * @return string
     */
    public static function fromArray($arrUsuarios)
    {

        $arrTipos = array(
            'A' => 'Administrador',
            'E' => 'Escritor',
        );

        $arrStatus = array(
            'A' => 'Ativo',
            'I' => 'Inativo',
        );

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>#</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Tipo</th><th>Status</th><th></th>';
        $html .= '</tr>';
        $html .= '</thead>';

        $html .= '<tbody>';

        foreach ($arrUsuarios as $item) {
            $html .= sprintf('<tr id="usuarios_row_%s">',$item->id);
            $html .= sprintf(
                '<td>%04d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>',
                $item->id,
                $item->nome,
                $item->email,
                $item->telefone,
                $arrTipos[$item->tipo],
                $arrStatus[$item->status]
            );
            $html .= sprintf(
                '<td><a class="btn btn-xs btn-default" href="%s">Editar</a> <a class="record-delete btn btn-xs btn-danger" href="%s" data-id="%s">Excluir</a></td>',
                Route::getInstance()->createLink('edt_usuario',array('id'=>$item->id)),
                Route::getInstance()->createLink('del_usuario',array('id'=>$item->id)),
                $item->id
            );
            $html .= '</tr>';
        }

        $html .= '</tbody>';

        $html .= '</table>';

        return $html;
    }
}