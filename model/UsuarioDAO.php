<?php

namespace JonasRuth\NewsPucpr;

use \PDO;

class UsuarioDAO
{

    public static function auth($email,$senha)
    {

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

        $st->bindParam(":email", $email, PDO::PARAM_STR);
        $st->bindParam(":senha", $senha, PDO::PARAM_STR);
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function find($id)
    {

        $sql = "SELECT
						*
					FROM
						usuarios
					WHERE
						id = :id";

        $st = Conn::getInstance()->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);

        $record = new Usuario();

        if (is_array($row) && sizeof($row) > 0) {
            foreach ($row as $key => $value) {
                $record->$key = $value;
            }
        }
        return $record;
    }

    public static function findAll()
    {

        $sql = "SELECT * FROM usuarios";
        //Envia a consulta ao MySQL

        $st = Conn::getInstance()->prepare($sql);
        $st->execute();


        $lista = array();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {

            $item = new Usuario();

            foreach ($row as $key => $value) {
                $item->$key = $value;
            }

            array_push($lista, $item);
        }

        return $lista;
    }

    public static function save(Usuario $usuario){

        $st = null;
        if($usuario->id){
            $st = Conn::getInstance()->prepare(self::update());
            $st->bindParam(":id", $usuario->id, PDO::PARAM_INT);
        }else{
            $st = Conn::getInstance()->prepare(self::insert());
        }

        $st->bindParam(":nome", $usuario->nome, PDO::PARAM_STR);
        $st->bindParam(":email", $usuario->email, PDO::PARAM_STR);
        $st->bindParam(":telefone", $usuario->telefone, PDO::PARAM_STR);
        $st->bindParam(":senha", $usuario->senha, PDO::PARAM_STR);
        $st->bindParam(":tipo", $usuario->tipo, PDO::PARAM_STR);
        $st->bindParam(":status", $usuario->status, PDO::PARAM_STR);

        return $st->execute();
    }

    public static function delete($id){

        $st = null;
        if(isset($id) && !empty($id)){
            $sql = "DELETE FROM usuarios WHERE id = :id;";
            $st = Conn::getInstance()->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
        }else{
            return false;
        }

        return $st->execute();
    }

    private static function insert(){

        $sql = "INSERT INTO usuarios
                    (nome,email,telefone,senha,tipo,status)
                VALUES
                    (:nome,:email,:telefone,:senha,:tipo,:status);";
        return $sql;

    }

    private static function update(){

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