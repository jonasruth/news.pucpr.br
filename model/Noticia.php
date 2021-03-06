<?php

namespace JonasRuth\NewsPucpr;
/**
 * Class Noticia
 * @package JonasRuth\NewsPucpr
 */
class Noticia {

    /**
     * @var int
     */
    public $id;
    /**
     * Título da publicação
     * @var string
     */
    public $titulo;
    /**
     * Subtítulo da publicação
     * @var string
     */
    public $subtitulo;

    /**
     * Texto da publicação
     * @var string
     */
    public $texto;
    /**
     * Data e hora da publicação
     * @var string
     */
    public $data;
    /**
     * Situação da publicação
     * A = Ativo
     * I = Inativo
     * @var string
     */
    public $status;

}