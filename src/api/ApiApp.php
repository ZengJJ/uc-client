<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;
use ZengJJ\UcClient\WorkCorpMsg;

class ApiApp extends UcApi
{
    /**
     * 极光推送
     * @param $app_token
     * @param string $content 内容
     * @param string $alias 别名（一般为手机号）
     * @param string $registration_id 极光分配的ID
     * @return array
     * @throws \Exception
     */
    public function jgPush($app_token, $content, $alias = null, $registration_id = null)
    {
        if (empty($app_token) || empty($content)) {
            throw new \Exception('缺失必要参数');
        }
        if (empty($registration_id) && empty($alias)) {
            throw new \Exception('registration_id 和 alias 不能同时为空');
        }

        return $this->request('/app/jg-push', [
            'app_token' => $app_token,
            'registration_id' => $registration_id,
            'alias' => $alias,
            'content' => $content
        ]);
    }

    /**
     * 站内消息推送
     * @param $app_token
     * @param $phone
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function sendMsg($app_token, $phone, $data)
    {
        if (empty($app_token) || empty($phone) || empty($data)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/send-msg', [
            'app_key' => $app_token,
            'phone' => $phone,
            'data' => $data,
        ]);
    }

    /**
     * 推送企业微信消息
     * @param $app_token
     * @param $phone
     * @param $internal
     * @param string $object
     * @param string[] $properties
     * @return array
     * @throws \Exception
     */
    public function sendWorkCorpMsg($app_token, $phone, $internal = WorkCorpMsg::APP_INTERNAL_YES, $object = WorkCorpMsg::MSG_OBJECT_TEXT, $properties = WorkCorpMsg::MSG_OBJECT_TEXT_PROPERTIES)
    {
        if (empty($app_token) || empty($phone)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/send-work-corp-msg', [
            'app_token' => $app_token,
            'internal' => $internal,
            'phone' => $phone,
            'data' => [
                'object' => $object,
                'properties' => $properties,
            ]
        ]);
    }

    /**
     * 反向同步用户数据
     * @param $app_token
     * @param $phone
     * @param $password
     * @param array $more
     * @return array
     * @throws \Exception
     */
    public function reverseSyncUser($app_token, $phone, $password, $more = [])
    {
        if (empty($app_token) || empty($phone) || empty($password)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/reverse-sync-user', [
            'app_token' => $app_token,
            'phone' => $phone,
            'password' => $password,
            'more' => $more
        ]);
    }
}