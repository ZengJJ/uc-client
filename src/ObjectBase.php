<?php

namespace ZengJJ\UcClient;

class ObjectBase
{
    /**
     * @var array $config
     */
    private $config;
    /**
     * @var string $base_url
     */
    private $base_url;
    /**
     * @var string $app_key
     */
    public $app_key;

    public function __construct(array $config = [])
    {
        $this->config = $config;
        if (isset($config['base_url'])) {
            $this->setBaseUrl($config['base_url']);
        }
        if (isset($config['app_key'])) {
            $this->app_key = $config['app_key'];
        }
    }

    public function setAppKey($app_key)
    {
        $this->app_key = $app_key;
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

    /**
     * 获取当前地址
     * @return string
     */
    public function currentUrl()
    {
        $pageURL = ($this->isHttps() ? 'https' : 'http') . "://";
        $pageURL .= $_SERVER["SERVER_NAME"];
        $pageURL .= in_array($_SERVER["SERVER_PORT"], [80, 443, '80', '443']) ? '' : (':' . $_SERVER["SERVER_PORT"]);
        $pageURL .= $_SERVER["REQUEST_URI"];

        return $pageURL;
    }

    /**
     * 获取当前域名
     * @return string
     */
    public function currentHost()
    {
        return ($this->isHttps() ? 'https' : 'http') . "://" . $_SERVER["SERVER_NAME"];
    }
}