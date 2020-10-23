<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;
use ZengJJ\UcClient\WorkCorpMsg;

class ApiApp extends UcApi
{
    /**
     * 推送企业微信消息
     * @param $app_token
     * @param $phone
     * @param string $object
     * @param string[] $properties
     * @return array
     * @throws \Exception
     */
    public function sendWorkCorpMsg($app_token, $phone, $object = WorkCorpMsg::MSG_OBJECT_TEXT, $properties = WorkCorpMsg::MSG_OBJECT_TEXT_PROPERTIES)
    {
        if (empty($app_token) || empty($phone)) {
            throw new \Exception('App Token 和 phone 不能为空');
        }

        return $this->request('/app/send-work-corp-msg', [
            'app_token' => $app_token,
            'phone' => $phone,
            'data' => [
                'object' => $object,
                'properties' => $properties,
            ]
        ]);
    }
}