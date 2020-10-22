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
     * 通过应用信息推送企业微信消息
     * @param $token
     * @param $to_app_key
     * @param $to_user_key // uc_id 或者 phone
     * @param $title
     * @param $desc
     * @param $url
     * @param array $content
     * @return array
     * @throws \Exception
     */
    public function userSendWorkCorpMsgByApp($token, $to_app_key, $to_user_key, $title, $desc, $url, $content = [])
    {
        if (empty($token)) {
            throw new \Exception('Token 不能为空');
        }

        return $this->request('/user/send-work-corp-msg-by-app', [
            'app_key' => $this->app_key,
            'token' => $token,
            'to_app_key' => $to_app_key,
            'to_user_key' => $to_user_key,
            'content' => array_merge([
                'title' => $title,
                'desc' => $desc,
                'url' => $url
            ], $content),
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