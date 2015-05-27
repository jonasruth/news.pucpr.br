<?php

class NoticiaDAO
{

    public function find($id)
    {

        $sql = "SELECT
						*
					FROM
						usuario
					WHERE
						id = :id";

        $st = Conn::getInstance()->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->execute();

        //Obtém registro encontrado
        $row = $st->fetch(PDO::FETCH_ASSOC);

        // Define nos atributos da instância os valores
        $record = new \NewsPucpr\Noticia();

        if (is_array($row) && sizeof($row) > 0) {
            foreach ($row as $key => $value) {
                $this->$key = $value;
            }
        }
    }
}