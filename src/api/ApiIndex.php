<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\AppParams;
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
        return $this->request('/index/get-user-token', ['app_key' => $this->app_key, 'phone' => $phone, 'password' => $password]);
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

    /**
     * 应用生成 （项目初始化时使用）
     * @param $phone
     * @param $password
     * @param $name
     * @param $hosts
     * @param int $type 参考值 AppParams::TYPE_NAMES
     * @param string $desc
     * @param string $logo
     * @return array
     * @throws \Exception
     */
    public function appGenerate($phone, $password, $name, $hosts, $type, $desc = '', $logo = '')
    {
        return $this->request('/index/app-generate', [
            'phone' => $phone,
            'password' => $password,
            'name' => $name,
            'hosts' => $hosts,
            'type' => $type,
            'desc' => $desc,
            'logo' => $logo,
        ]);
    }
}