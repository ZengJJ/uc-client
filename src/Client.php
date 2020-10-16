<?php

namespace ZengJJ\UcClient;

class Client
{
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function show()
    {
        echo $this->config;
    }
}