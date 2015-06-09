<?php

namespace JonasRuth\NewsPucpr;

use \PDO;

/**
 * Class NoticiaDAO
 * @package JonasRuth\NewsPucpr
 */
class NoticiaDAO
{

    /**
     * Consulta uma Noticia pelo campo id
     * @param $id
     * @return Noticia
     */
    public static function find($id)
    {

        $sql = "SELECT
						*
					FROM
						noticias
					WHERE
						id = :id";

        // preparo a consulta e executo
        $st = Conn::getInstance()->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);

        // Define nos atributos da instância os valores
        $record = new Noticia();

        // populo o objeto
        if (is_array($row) && sizeof($row) > 0) {
            foreach ($row as $key => $value) {
                $record->$key = $value;
            }
        }
        //retorno o objeto populado
        return $record;
    }

    /**
     * Consulta todas as Noticias
     * @return array
     */
    public static function findAll()
    {

        $sql = "SELECT * FROM noticias ORDER BY id DESC";

        // preparo a consulta e executo
        $st = Conn::getInstance()->prepare($sql);
        $st->execute();

        // populo o array de objetos
        $lista = array();
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $item = new Noticia();
            foreach ($row as $key => $value) {
                $item->$key = $value;
            }
            array_push($lista, $item);
        }

        // retorno o array
        return $lista;
    }

    /**
     * Consulta todas as Noticias ativas
     * Ordena por id decrescente
     * @return array
     */
    public static function findAllAtivasDesc()
    {

        // Defino a consulta e executo
        $sql = "SELECT * FROM noticias WHERE status = 'A' ORDER BY id DESC";
        $st = Conn::getInstance()->prepare($sql);
        $st->execute();

        // populo o array de objetos
        $lista = array();
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $item = new Noticia();
            foreach ($row as $key => $value) {
                $item->$key = $value;
            }
            array_push($lista, $item);
        }

        // retorno o array
        return $lista;
    }

    /**
     * Persiste o objeto Noticia
     * @param Noticia $noticia
     * @return bool
     */
    public static function save(Noticia $noticia){

        $st = null;
        if($noticia->id){ // Se for UPDATE
            // recebo a sql
            $st = Conn::getInstance()->prepare(self::update());
            // bindo o parametro
            $st->bindParam(":id", $noticia->id, PDO::PARAM_INT);
        }else{ // se for INSERT
            // recebo a sql
            $st = Conn::getInstance()->prepare(self::insert());
        }

        // Defino a data da notícia como sendo o momento do salvamento
        $data = date("Y-m-d H:i:s");

        // bindo os demais parametros
        $st->bindParam(":titulo", $noticia->titulo, PDO::PARAM_STR);
        $st->bindParam(":subtitulo", $noticia->subtitulo, PDO::PARAM_STR);
        $st->bindParam(":texto", $noticia->texto, PDO::PARAM_STR);
        $st->bindParam(":data", $data, PDO::PARAM_STR);
        $st->bindParam(":status", $noticia->status, PDO::PARAM_STR);

        // executo a query
        return $st->execute();
    }

    /**
     * Deleta uma Noticia com base no id
     * @param $id
     * @return bool
     */
    public static function delete($id){

        $st = null;
        if(!empty($id)){
            // defino a query
            $sql = "DELETE FROM noticias WHERE id = :id;";
            $st = Conn::getInstance()->prepare($sql);
            // bindo o paramtro
            $st->bindParam(":id", $id, PDO::PARAM_INT);
        }else{
            // retorno false caso nao venha ID
            return false;
        }
        // executo a query
        return $st->execute();
    }

    /**
     * Retorna a query de insert
     * @return string
     */
    private static function insert(){

        // crio a query para retorna-la
        $sql = "INSERT INTO noticias
                    (titulo,subtitulo,texto,data,status)
                VALUES
                    (:titulo,:subtitulo,:texto,:data,:status);";
        return $sql;

    }

    /**
     * Retorna a query de update
     * @return string
     */
    private static function update(){

        // crio a query para retorna-la
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