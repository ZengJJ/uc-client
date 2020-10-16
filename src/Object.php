<?php

namespace ZengJJ\UcClient;

class Object
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