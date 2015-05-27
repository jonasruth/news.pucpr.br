<?php

namespace NewsPucpr;

/**
 * Class UsuarioController
 */
class UsuarioController
{

    /**
     * Listar
     * Acesso: Administrador
     */
    public static function listarAction()
    {
        $usuarios = UsuarioDAO::findAll();
        echo ListarUsuario::fromArray($usuarios);
    }

    /**
     * Cadastrar
     * Acesso: Administrador
     */
    public static function inserirAction()
    {

    }

    /**
     * Editar
     * Acesso: Administrador
     */
    public static function editarAction()
    {

    }

    /**
     * Deletar
     * Acesso: Administrador
     */
    public static function deletarAction()
    {

    }

    /**
     * Salvar
     * Acesso: Administrador
     */
    public static function salvarAction()
    {

    }

}