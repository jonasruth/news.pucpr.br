<?php

namespace JonasRuth\NewsPucpr;

/**
 * Class UsuarioController
 * @package JonasRuth\NewsPucpr
 */
/**
 * Class UsuarioController
 * @package JonasRuth\NewsPucpr
 */
class UsuarioController
{

    /**
     * Listar todos usuários
     */
    public static function listarAction()
    {
        // busca todos os usuários
        $usuarios = UsuarioDAO::findAll();
        // desenha a tabela com os usuários encontrados
        echo TabelaUsuarios::fromArray($usuarios);
    }

    /**
     * Autenticar um usuário
     * @param $email
     * @param $senha
     * @return bool
     */
    public static function autenticarAction($email,$senha)
    {
        // Realiza logout para limpar possível sessão em aberto
        self::logoutAction();

        // Consulta o usuário no BD
        $usuario = UsuarioDAO::auth($email,$senha);
        // Se o usuário existe
        if(!empty($usuario)){
            // Variável para verificação rápida
            $_SESSION['auth']['valid'] = 'ok';
            // Armazena dados do usuário autenticado
            $_SESSION['auth']['user'] = $usuario;
            // Retorna TRUE sinalizando que o login foi feito
            return true;
        }
        // retorna false em casos contrários
        return false;
    }

    /**
     * Retorna dados do usuário logado
     * @return mixed
     * @throws \Exception
     */
    public static function getLogged()
    {
        // Se estiver logado
        if(self::isLogged()){
            // Retorna os dados do usuário autenticado
            return $_SESSION['auth']['user'];
        }
        // Em casos contrários retorna exceção
        throw new \Exception('Nenhum usuário autenticado.');
    }

    /**
     * Informa se o usuário está autenticado
     * @return bool
     */
    public static function isLogged()
    {
        // caso a sessão seja julgada válida para um login
        if(!empty($_SESSION['auth']['valid']) && $_SESSION['auth']['valid'] === 'ok'){
            // afirma que o usuário está logado
            return true;
        }
        // em casos contrários nega que o usuário está logado
        return false;
    }

    /**
     * Realiza Logout
     */
    public static function logoutAction()
    {
        // limpa a variável da sessão relativa a autenticacão
        unset($_SESSION['auth']);
    }

    /**
     * Exclui usuário
     * @param $id
     * @return bool
     */
    public static function deletarAction($id)
    {
        // deleta um usuário
        return UsuarioDAO::delete($id);
    }

    /**
     * Persiste usuário
     * @param $p_usuario
     * @return bool
     */
    public static function salvarAction($p_usuario)
    {
        // popula em objeto o usuário que vem em formato de array
        $toSave = new Usuario();
        if (is_array($p_usuario) && sizeof($p_usuario) > 0) {
            foreach ($p_usuario as $key => $value) {
                $toSave->$key = $value;
            }
        }
        // persiste usuário
        return UsuarioDAO::save($toSave);
    }

}