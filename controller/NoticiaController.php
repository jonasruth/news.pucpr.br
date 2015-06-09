<?php

namespace JonasRuth\NewsPucpr;

/**
 * Class NoticiaController
 */
class NoticiaController
{


    /**
     * Leitura da notícia
     * Acesso: aberto
     */
    public static function leituraPublicoAction($id)
    {
        // recupero a noticia no BD
        $noticia = NoticiaDAO::find($id);
        // utilizo o helper que desenha a noticia na tela
        echo LeituraNoticia::fromRecord($noticia);
    }

    /**
     * Lista pública de notícias
     * Acesso: aberto
     */
    public static function listarPublicoAction()
    {
        // recupero todas as noticias ativas em ordem decrescente
        $noticias = NoticiaDAO::findAllAtivasDesc();
        // desenho a lista de noticias na tela
        echo ListaNoticias::fromArray($noticias);
    }

    /**
     * Listar notícias
     * Acesso: Escritor, Administrador
     */
    public static function listarAction()
    {
        // recupera todas as noticias
        $noticias = NoticiaDAO::findAll();
        // desenha a tabela na tela em formato de array
        echo TabelaNoticias::fromArray($noticias);
    }

    /**
     * Deletar notícias
     * Acesso: Escritor, Administrador
     */
    public static function deletarAction($id)
    {
        // deleta a noticia desejada
        return NoticiaDAO::delete($id);
    }

    /**
     * Salvar notícias
     * Acesso: Escritor, Administrador
     */
    public static function salvarAction($p_noticia)
    {

        // as informacoes do formulario sao populadas no objeto
        $toSave = new Noticia();
        if (is_array($p_noticia) && sizeof($p_noticia) > 0) {
            foreach ($p_noticia as $key => $value) {
                $toSave->$key = $value;
            }
        }

        // salvo o objeto
        return NoticiaDAO::save($toSave);
    }

}