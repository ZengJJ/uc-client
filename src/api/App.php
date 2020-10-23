<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\UcApi;
use ZengJJ\UcClient\WorkCorpMsg;

class App extends UcApi
{
    /**
     * 推送企业微信消息
     * @param $app_token
     * @param $data
     * @param string $object
     * @return array
     * @throws \Exception
     */
    public function sendWorkCorpMsg($app_token, $object = WorkCorpMsg::MSG_OBJECT_TEXT, $properties = WorkCorpMsg::MSG_OBJECT_TEXT_PROPERTIES)
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
}