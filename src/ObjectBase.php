<?php

namespace ZengJJ\UcClient;

class ObjectBase
{
    /**
     * @var array $config
     */
    public $config;
    /**
     * @var string $web_host
     */
    public $web_host;
    /**
     * @var string $api_host
     */
    public $api_host;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        if (empty($this->web_host) && !isset($config['web_host'])) {
            throw new \Exception('缺失必要参数 web_host');
        }
        if (empty($this->api_host) && !isset($config['api_host'])) {
            throw new \Exception('缺失必要参数 api_host');
        }
        $this->web_host = $this->web_host ?: $config['web_host'];
        $this->api_host = $this->api_host ?: $config['api_host'];
    }
}