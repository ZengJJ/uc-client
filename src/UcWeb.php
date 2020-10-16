<?php


namespace ZengJJ\UcClient;


use Guzzle\Http\Client;

class UcWeb extends ObjectBase
{
    /**
     * @var string $url
     */
    public $url;

    public function getUrl($path)
    {
        $this->url = $this->web_host . $path;
    }
}