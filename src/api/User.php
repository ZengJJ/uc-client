<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;

class User extends UcApi
{
    /**
     * 发送消息
     * @param $token
     * @param $to_app_key
     * @param $to_user_key
     * @param $content
     * @return array
     * @throws \Exception
     */
    public function sendMsg($token, $to_app_key, $to_user_key, $content)
    {
        if (empty($token)) {
            throw new \Exception('Token 不能为空');
        }
        return $this->request('/user/send-msg', [
            'app_key' => $this->app_key,
            'token' => $token,
            'to_app_key' => $to_app_key,
            'to_user_key' => $to_user_key,
            'content' => $content,
        ]);
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
            throw new \Exception('Token 不能为空');
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
            throw new \Exception('Token 不能为空');
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
            throw new \Exception('Token 不能为空');
        }
        return $this->request('/user/info', ['app_key' => $this->app_key, 'token' => $token]);
    }
}