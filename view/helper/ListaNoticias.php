<?php

namespace JonasRuth\NewsPucpr;

use JonasRuth\PhpSimpleRoute\Route;

class ListaNoticias
{
    public static function fromArray($arrNoticias)
    {
        $html = '';

        foreach ($arrNoticias as $item) {
            $date = \DateTime::createFromFormat('Y-m-d H:i:s', $item->data);
            $html .= sprintf('<div id="noticia_id_%s" class="blog-post">',$item->id).PHP_EOL;
            $html .= sprintf('<h2 class="blog-post-title"><a href="%s">%s</a></h2>',Route::getInstance()->createLink('leitura', array('id'=>$item->id,'titulo_slug'=>Util::slugify($item->titulo))),$item->titulo).PHP_EOL;
//            $html .= sprintf('<p class="blog-post-meta">%s</p>',$item->subtitulo).PHP_EOL;
            $html .= sprintf('<p class="blog-post-meta">%s by <a href="#">PUCPR News</a></p>',$date->format('l j F Y h:ia')).PHP_EOL;
//            $html .= sprintf('<p>%s</p>',$item->texto).PHP_EOL;
            $html .= '</div><!-- /.blog-post -->'.PHP_EOL.PHP_EOL;
        }

        return $html;
    }
}