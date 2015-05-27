<?php

namespace NewsPucpr;

/**
 * Class Usuario
 * @package NewsPucpr
 */
class Usuario{

    /**
     * @var int
     */
    public $id;
    /**
     * Nome da pessoa
     * @var string
     */
    public $nome;
    /**
     * Email
     * @var string
     */
    public $email;
    /**
     * Telefone principal para contato
     * @var string
     */
    public $telefone;
    /**
     * Senha de acesso
     * @var string
     */
    public $senha;
    /**
     * Tipo de usuário
     * A = Administrador
     * E = Escritor
     * @var string
     */
    public $tipo;
    /**
     * Situação do cadastro do usuário
     * A = Ativo
     * I = Inativo
     * @var string
     */
    public $status;

}