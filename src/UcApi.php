<?php


namespace ZengJJ\UcClient;

use GuzzleHttp\Client;

class UcApi extends ObjectBase
{
    /**
     * @var Client $client
     */
    public $client;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $this->client = new Client();
    }

    /**
     * 推送企业微信消息
     * @param $app_token
     * @param $data
     * @param string $object
     * @return array
     * @throws \Exception
     */
    public function appSendWorkCorpMsg($app_token, $object = WorkCorpMsg::MSG_OBJECT_TEXT, $properties = WorkCorpMsg::MSG_OBJECT_TEXT_PROPERTIES)
    {
        if (empty($app_token)) {
            throw new \Exception('App Token 不能为空');
        }

        return $this->request('/app/send-work-corp-msg', [
            'app_token' => $app_token,
            'object' => $object,
            'properties' => $properties,
        ]);
    }

    /**
     * 发送消息
     * @param $token
     * @param $to_app_key
     * @param $to_user_key
     * @param $content
     * @return array
     * @throws \Exception
     */
    public function userSendMsg($token, $to_app_key, $to_user_key, $content)
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
    public function userSyncAppPwd($token, $pwd)
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
    public function userCheckAppPwd($token, $pwd)
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
    public function userInfo($token)
    {
        if (empty($token)) {
            throw new \Exception('Token 不能为空');
        }
        return $this->request('/user/info', ['app_key' => $this->app_key, 'token' => $token]);
    }

    public function updateUser($token, $params)
    {
        return [];
    }

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

    /**
     * 错误上报
     * @param $content
     * @param array $data
     * @param string $category
     * @param int $level
     * @return array
     * @throws \Exception
     */
    public function reportError($content, $data = array(), $category = 'global', $level = 1)
    {
        return $this->request('/index/error-log', [
            "app_key" => $this->app_key,
            "host" => $_SERVER['HTTP_HOST'],
            "content" => $content ?: '错误',
            "data" => $data,
            "category" => $category,
            "level" => $level
        ], 'POST');
    }
}