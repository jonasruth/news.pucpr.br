<?php

namespace JonasRuth\NewsPucpr;

use JonasRuth\PhpSimpleRoute\Route;

class TabelaNoticias
{
    public static function fromArray($arrNoticias)
    {

        $arrStatus = array(
            'A' => 'Ativo',
            'I' => 'Inativo',
        );

        $html = '<table class="table table-striped">';

        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>#</th><th>Título</th><th>Subtítulo</th><th>Data e hora</th><th>Status</th><th></th>';
        $html .= '</tr>';
        $html .= '</thead>';

        $html .= '<tbody>';

        foreach ($arrNoticias as $item) {
            $html .= sprintf('<tr id="noticias_row_%s">',$item->id);

            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $item->data);

            $html .= sprintf(
                '<td>%04d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>',
                $item->id,
                $item->titulo,
                $item->subtitulo,
                $date->format('d/m/y H:i:s'),
                $arrStatus[$item->status]
            );
            $html .= sprintf(
                '<td><a class="btn btn-xs btn-default" href="%s">Editar</a> <a class="record-delete btn btn-xs btn-danger" href="%s" data-id="%s">Excluir</a></td>',
                Route::getInstance()->createLink('edt_noticia',array('id'=>$item->id)),
                Route::getInstance()->createLink('del_noticia',array('id'=>$item->id)),
                $item->id
            );
            $html .= '</tr>';
        }

        $html .= '</tbody>';

        $html .= '</table>';

        return $html;
    }
}