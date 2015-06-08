<?php

namespace JonasRuth\NewsPucpr;

use \PDO;

/**
 *
 * Class Conn
 * @package JonasRuth\NewsPucpr
 */
class Conn {

    /**
     * @var Conn
     */
    private static $instance = null;

    /**
     * Singleton
     * Recupera a instância já criada ou cria uma nova
     * @return PDO|null
     */
    public static function getInstance(){

        if(self::$instance == null){
            self::$instance = new PDO(
                "mysql:dbname=pospuc;host:localhost",
                "root",
                "123456"
            );
        }

        return self::$instance;

    }


}