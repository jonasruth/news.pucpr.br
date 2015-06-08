<?php

namespace JonasRuth\NewsPucpr;

use \PDO;

class NoticiaDAO
{

    public static function find($id)
    {

        $sql = "SELECT
						*
					FROM
						noticias
					WHERE
						id = :id";

        $st = Conn::getInstance()->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);

        // Define nos atributos da instância os valores
        $record = new Noticia();

        if (is_array($row) && sizeof($row) > 0) {
            foreach ($row as $key => $value) {
                $record->$key = $value;
            }
        }
        return $record;
    }

    public static function findAll()
    {

        $sql = "SELECT * FROM noticias";
        //Envia a consulta ao MySQL

        $st = Conn::getInstance()->prepare($sql);
        $st->execute();


        $lista = array();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {

            $item = new Noticia();

            foreach ($row as $key => $value) {
                $item->$key = $value;
            }

            array_push($lista, $item);
        }

        return $lista;
    }

    public static function findAllAtivasDesc()
    {

        $sql = "SELECT * FROM noticias WHERE status = 'A' ORDER BY id DESC";
        //Envia a consulta ao MySQL

        $st = Conn::getInstance()->prepare($sql);
        $st->execute();


        $lista = array();

        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {

            $item = new Noticia();

            foreach ($row as $key => $value) {
                $item->$key = $value;
            }

            array_push($lista, $item);
        }

        return $lista;
    }

    public static function save(Noticia $noticia){

        $st = null;
        if($noticia->id){
            $st = Conn::getInstance()->prepare(self::update());
            $st->bindParam(":id", $noticia->id, PDO::PARAM_INT);
        }else{
            $st = Conn::getInstance()->prepare(self::insert());
        }

        $data = date("Y-m-d H:i:s");

        $st->bindParam(":titulo", $noticia->titulo, PDO::PARAM_STR);
        $st->bindParam(":subtitulo", $noticia->subtitulo, PDO::PARAM_STR);
        $st->bindParam(":texto", $noticia->texto, PDO::PARAM_STR);
        $st->bindParam(":data", $data, PDO::PARAM_STR);
        $st->bindParam(":status", $noticia->status, PDO::PARAM_STR);

        return $st->execute();
    }

    public static function delete($id){

        $st = null;
        if(isset($id) && !empty($id)){
            $sql = "DELETE FROM noticias WHERE id = :id;";
            $st = Conn::getInstance()->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
        }else{
            return false;
        }

        return $st->execute();
    }

    private static function insert(){

        $sql = "INSERT INTO noticias
                    (titulo,subtitulo,texto,data,status)
                VALUES
                    (:titulo,:subtitulo,:texto,:data,:status);";
        return $sql;

    }

    private static function update(){

        $sql = "UPDATE
						noticias
					SET
						titulo = :titulo,
						subtitulo = :subtitulo,
						texto = :texto,
						data = :data,
						status = :status
					WHERE
						id = :id";

        return $sql;

    }
}