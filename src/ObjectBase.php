<?php

namespace ZengJJ\UcClient;

class ObjectBase
{
    /**
     * @var array $config
     */
    public $config;
    /**
     * @var string $base_url
     */
    public $base_url;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        if (isset($config['base_url'])) {
            $this->setBaseUrl($config['base_url']);
        }
    }

    public function setBaseUrl($base_url)
    {
        if (!$this->hasHttpOrHttps($base_url)) {
            $base_url = ($this->isHttps() ? 'https://' : 'http://') . $base_url;
        }

        $this->base_url = $base_url;
    }

    public function getUrl($uri)
    {
        if ($this->hasHttpOrHttps($uri)) {
            return $uri;
        }

        return rtrim(strval($this->base_url), '/') . '/' . ltrim(strval($uri), '/');
    }

    /**
     * 判断链接是否携带了 http 或 https
     * @param $url
     * @return bool
     */
    public function hasHttpOrHttps($url)
    {
        $preg = "/^http(s)?:\\/\\/.+/";
        if (preg_match($preg, $url)) {
            return true;
        }

        return false;
    }

    /**
     * 判断是否为 https
     * @return bool
     */
    public function isHttps()
    {
        if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
            return true;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            return true;
        } elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
            return true;
        }

        return false;
    }
}