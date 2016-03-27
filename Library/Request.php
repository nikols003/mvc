<?php

class Request
{
    private $get;
    private $post;

    private $server;


    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;

        $this->server = $_SERVER;

    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return (bool)$_POST;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key)
    {
        if (isset($this->get[$key])) {
            return $this->get[$key];
        }

        return null;
    }

    /**
     * @param $key
     * @return null
     */
    public function post($key)
    {
        if (isset($this->post[$key])) {
            return $this->post[$key];
        }

        return null;
    }

    public function server($key)
    {
        if (isset($this->server[$key])) {
            return $this->server[$key];
        }

        return null;
    }

    public function getIpAddress()
    {
        return $this->server('REMOTE_ADDR');
    }

    public function getURI()
     {
         $uri = $this->server('REQUEST_URI');
         $uri = explode('?', $uri);
         return $uri[0];
     }
    public function mergeGet(array $params)
     {
            $this->get += $params;
            $_GET += $params;
        }



}