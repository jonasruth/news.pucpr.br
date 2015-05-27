<?php

namespace NewsPucpr;

use \PDO;

class UsuarioDAO
{

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

        // Define nos atributos da instância os valores
        $record = new \NewsPucpr\Usuario();

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


        //Inicia a lista de produtos
        $lista = array();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {

            $item = new \NewsPucpr\Usuario();

            foreach ($row as $key => $value) {
                $item->$key = $value;
            }

            array_push($lista, $item);
        }

        return $lista;
    }
}