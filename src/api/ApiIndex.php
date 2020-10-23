<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;

class ApiIndex extends UcApi
{
    public function getUserToken()
    {
    }

    /**
     * 获取应用的 TOKEN
     * @param $app_secret
     * @return array
     * @throws \Exception
     */
    public function getAppToken($app_secret)
    {
        if (empty($app_secret)) {
            throw new \Exception('Secret 不能为空');
        }
        return $this->request('/index/get-app-token', ['app_key' => $this->app_key, 'app_secret' => $app_secret]);
    }
}