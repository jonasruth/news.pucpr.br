<?php

namespace NewsPucpr;

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
        $noticia = NoticiaDAO::find($id);
        echo LeituraNoticia::fromRecord($noticia);
    }

    /**
     * Lista pública de notícias
     * Acesso: aberto
     */
    public static function listarPublicoAction()
    {
        $noticias = NoticiaDAO::findAllAtivasDesc();
        echo ListaNoticias::fromArray($noticias);
    }

    /**
     * Visualizar informações da notícia
     * Acesso: Escritor, Administrador
     */
    public static function visualizarAction()
    {

    }

    /**
     * Listar notícias
     * Acesso: Escritor, Administrador
     */
    public static function listarAction()
    {
        $noticias = NoticiaDAO::findAll();
        echo TabelaNoticias::fromArray($noticias);
    }

    /**
     * Cadastrar notícias
     * Acesso: Escritor, Administrador
     */
    public static function inserirAction()
    {

    }

    /**
     * Editar notícias
     * Acesso: Escritor, Administrador
     */
    public static function editarAction()
    {

    }

    /**
     * Deletar notícias
     * Acesso: Escritor, Administrador
     */
    public static function deletarAction($id)
    {
        return NoticiaDAO::delete($id);
    }

    /**
     * Salvar notícias
     * Acesso: Escritor, Administrador
     */
    public static function salvarAction($p_noticia)
    {
        $toSave = new Noticia();
        if (is_array($p_noticia) && sizeof($p_noticia) > 0) {
            foreach ($p_noticia as $key => $value) {
                $toSave->$key = $value;
            }
        }
        return NoticiaDAO::save($toSave);
    }

}