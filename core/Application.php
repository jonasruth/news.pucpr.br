<?php

namespace JonasRuth\NewsPucpr;

/**
 * Class Application
 * @package JonasRuth\NewsPucpr
 */
class Application
{

    /**
     * @var null
     */
    private static $instance = null;

    /**
     * @var string
     */
    private $protocol = 'http';
    /**
     * @var string
     */
    private $domain = 'news.pucpr.br';
    /**
     * @var string
     */
    private $basedir = '/';

    /**
     * Singleton
     * Recupera a instância já criada ou cria uma nova
     * @return Application
     */
    public static function getInstance()
    {

        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;

    }

    /**
     * @return string
     */
    public function getBaseURL()
    {
        return sprintf("%s://%s%s",$this->protocol,$this->domain,$this->basedir);
    }

    /**
     * @param string $basedir
     */
    public function setBasedir($basedir)
    {
        $this->basedir = $basedir;
        return $this;
    }

    /**
     * @return string
     */
    public function getBasedir()
    {
        return $this->basedir;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $protocol
     */
    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    /**
     * @return string
     */
    public function getProtocol()
    {
        return $this->protocol;
    }




}