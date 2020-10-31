<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;

class ApiUser extends UcApi
{
    /**
     * 同步用户密码
     * @param $token
     * @param $pwd
     * @return array
     * @throws \Exception
     */
    public function syncAppPwd($token, $pwd)
    {
        if (empty($token)) {
            throw new \Exception('缺失必要参数');
        }
        return $this->request('/user/sync-app-pwd', [
            'app_key' => $this->app_key,
            'token' => $token,
            'pwd' => $pwd
        ]);
    }

    /**
     * 校验用户密码
     * @param $token
     * @param $pwd
     * @return array
     * @throws \Exception
     */
    public function checkAppPwd($token, $pwd)
    {
        if (empty($token)) {
            throw new \Exception('缺失必要参数');
        }
        return $this->request('/user/check-app-pwd', [
            'app_key' => $this->app_key,
            'token' => $token,
            'pwd' => $pwd
        ]);
    }

    /**
     * 获取用户数据
     * @param $token
     * @return array
     * @throws \Exception
     */
    public function info($token)
    {
        if (empty($token)) {
            throw new \Exception('缺失必要参数');
        }
        return $this->request('/user/info', ['app_key' => $this->app_key, 'token' => $token]);
    }
}