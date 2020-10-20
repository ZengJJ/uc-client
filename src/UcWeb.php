<?php


namespace ZengJJ\UcClient;

use GuzzleHttp\Client;

class UcWeb extends ObjectBase
{
    public function thirdUrl($app_key, $app_url)
    {
        return $this->getUrl('/third?app_key=' . $app_key . '&app_url=' . urlencode($app_url));
    }
}