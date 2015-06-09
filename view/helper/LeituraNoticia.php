<?php

namespace JonasRuth\NewsPucpr;

/**
 * Class LeituraNoticia
 * @package JonasRuth\NewsPucpr
 */
class LeituraNoticia
{
    /**
     * Desenha a notícia em formato HTML para leitura
     * @param $noticia
     * @return string
     */
    public static function fromRecord($noticia)
    {
        $html = '';

        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $noticia->data);
        $html .= '<div class="blog-post">';
        $html .= sprintf('<h2 class="blog-post-title">%s</h2>',$noticia->titulo);
        $html .= sprintf('<p class="blog-post-meta">%s</p>',$noticia->subtitulo);
        $html .= sprintf('<p class="blog-post-meta">%s by <a href="#">PUCPR News</a></p>',$date->format('l j F Y'));
        $html .= sprintf('<p>%s</p>',$noticia->texto);
        $html .= '</div><!-- /.blog-post -->';

        return $html;
    }
}