<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;

class ApiUser extends UcApi
{
    /**
     * 刷新 TOKEN
     * @param $token
     * @param null $work_corp_id 未知企业微信时，可以指定（主要用作多企业绑定情况下的API登录）
     * @return array
     * @throws \Exception
     */
    public function tokenRefresh($token, $work_corp_id = null)
    {
        if (empty($token)) {
            throw new \Exception('缺失必要参数');
        }
        return $this->request('/user/token-refresh', [
            'app_key' => $this->app_key,
            'token' => $token,
            'work_corp_id' => $work_corp_id
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
}