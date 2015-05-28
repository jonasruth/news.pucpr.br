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
    public static function salvarAction($p_usuario)
    {
        $toSave = new Usuario();
        if (is_array($p_usuario) && sizeof($p_usuario) > 0) {
            foreach ($p_usuario as $key => $value) {
                $toSave->$key = $value;
            }
        }
        return UsuarioDAO::save($toSave);
    }

}