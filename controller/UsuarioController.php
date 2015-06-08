<?php

namespace JonasRuth\NewsPucpr;

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
        echo TabelaUsuarios::fromArray($usuarios);
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
     * Tentar Autenticar
     * Acesso: Público
     */
    public static function autenticarAction($email,$senha)
    {
        self::logoutAction();

        $usuario = UsuarioDAO::auth($email,$senha);
        if(!empty($usuario)){
            $_SESSION['auth']['valid'] = 'ok';
            $_SESSION['auth']['user'] = $usuario;
            return true;
        }
        return false;
    }

    public static function getLogged()
    {
        if(!empty($_SESSION['auth']['user'])){
            return $_SESSION['auth']['user'];
        }
        throw new \Exception('Nenhum usuário autenticado.');
    }

    public static function isLogged()
    {
        if(!empty($_SESSION['auth']['valid']) && $_SESSION['auth']['valid'] === 'ok'){
            return true;
        }
        return false;
    }

    /**
     * Tentar Logout
     * Acesso: Público
     */
    public static function logoutAction()
    {
        unset($_SESSION['auth']);
    }

    /**
     * Deletar
     * Acesso: Administrador
     */
    public static function deletarAction($id)
    {
        return UsuarioDAO::delete($id);
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