<?php

namespace JonasRuth\NewsPucpr;

use \PDO;

/**
 * Class UsuarioDAO
 * @package JonasRuth\NewsPucpr
 */
class UsuarioDAO
{

    /**
     * Consulta usuário para autenticaçao
     * @param $email
     * @param $senha
     * @return mixed
     */
    public static function auth($email,$senha)
    {

        // define query
        $sql = "SELECT
						id,nome,email,telefone,tipo,status
					FROM
						usuarios
					WHERE
						email = :email
					AND
						senha = :senha
					AND
					    status = 'A'
                ";


        $st = Conn::getInstance()->prepare($sql);

        // binda os parâmetros da consulta
        $st->bindParam(":email", $email, PDO::PARAM_STR);
        $st->bindParam(":senha", $senha, PDO::PARAM_STR);

        // executa consulta
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);
        // retorna registro
        return $row;
    }

    /**
     * Consulta um usuário pelo id
     * @param $id
     * @return Usuario
     */
    public static function find($id)
    {

        // Define query
        $sql = "SELECT
						*
					FROM
						usuarios
					WHERE
						id = :id";

        $st = Conn::getInstance()->prepare($sql);
        // Binda parâmetros
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        // Executa consulta
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);

        // popula a tupla em um objeto Usuario
        $record = new Usuario();
        if (is_array($row) && sizeof($row) > 0) {
            foreach ($row as $key => $value) {
                $record->$key = $value;
            }
        }

        // retorna o objeto Usuario
        return $record;
    }

    /**
     * Consulta todos os Usuários
     * @return array
     */
    public static function findAll()
    {

        // Define a query
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";

        //Envia a consulta ao MySQL
        $st = Conn::getInstance()->prepare($sql);
        $st->execute();

        //popula a lista em objetos Usuario
        $lista = array();
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $item = new Usuario();
            foreach ($row as $key => $value) {
                $item->$key = $value;
            }
            array_push($lista, $item);
        }

        // retorna a lista
        return $lista;
    }

    /**
     * Persiste um usuário
     * @param Usuario $usuario
     * @return bool
     */
    public static function save(Usuario $usuario){

        $st = null;
        if($usuario->id){
            // Se for edição de usuário
            $st = Conn::getInstance()->prepare(self::update());
            $st->bindParam(":id", $usuario->id, PDO::PARAM_INT);
        }else{
            // Se for cadastro de usuário
            $st = Conn::getInstance()->prepare(self::insert());
        }

        // binda os parâmetros
        $st->bindParam(":nome", $usuario->nome, PDO::PARAM_STR);
        $st->bindParam(":email", $usuario->email, PDO::PARAM_STR);
        $st->bindParam(":telefone", $usuario->telefone, PDO::PARAM_STR);
        $st->bindParam(":senha", $usuario->senha, PDO::PARAM_STR);
        $st->bindParam(":tipo", $usuario->tipo, PDO::PARAM_STR);
        $st->bindParam(":status", $usuario->status, PDO::PARAM_STR);

        // executa a query
        return $st->execute();
    }

    /**
     * Exclui um usuário
     * @param $id
     * @return bool
     */
    public static function delete($id){

        // constroi a query
        $st = null;
        if(isset($id) && !empty($id)){
            $sql = "DELETE FROM usuarios WHERE id = :id;";
            $st = Conn::getInstance()->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
        }else{
            // caso nenhum id tenha sido informado retorna false
            return false;
        }

        // executa query
        return $st->execute();
    }

    /**
     * Retorna query de cadastro
     * @return string
     */
    private static function insert(){

        // define a query de cadastro
        $sql = "INSERT INTO usuarios
                    (nome,email,telefone,senha,tipo,status)
                VALUES
                    (:nome,:email,:telefone,:senha,:tipo,:status);";

        return $sql;

    }

    /**
     * Retorna a query de edição
     * @return string
     */
    private static function update(){

        // define a query de edição
        $sql = "UPDATE
						usuarios
					SET
						nome = :nome,
						email = :email,
						telefone = :telefone,
						senha = :senha,
						tipo = :tipo,
						status = :status
					WHERE
						id = :id";

        return $sql;

    }
}