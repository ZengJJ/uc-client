<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;

class ApiIndex extends UcApi
{
    /**
     * 通过账户密码获取用户 TOKEN
     * @param $phone
     * @param $password
     * @return array
     * @throws \Exception
     */
    public function getUserToken($phone, $password)
    {
        if (empty($phone) || empty($password)) {
            throw new \Exception('缺失必要参数');
        }
        return $this->request('/index/get-app-token', ['app_key' => $this->app_key, 'phone' => $phone, 'password' => $password]);
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
            throw new \Exception('缺失必要参数');
        }
        return $this->request('/index/get-app-token', ['app_key' => $this->app_key, 'app_secret' => $app_secret]);
    }
}