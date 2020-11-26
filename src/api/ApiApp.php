<?php

namespace ZengJJ\UcClient\api;

use ZengJJ\UcClient\NoticeMsg;
use ZengJJ\UcClient\UcApi;

class ApiApp extends UcApi
{
    /**
     * 检测TOKEN是否有效
     * @param $app_token
     * @return array|string
     * @throws \Exception
     */
    public function checkToken($app_token)
    {
        if (empty($app_token)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/check-token', [
            'app_token' => $app_token,
        ]);
    }

    /**
     * 获取已授权企业列表
     * @param $app_token
     * @return array
     * @throws \Exception
     */
    public function workCorpList($app_token)
    {
        if (empty($app_token)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/work-corp-list', [
            'app_token' => $app_token,
        ]);
    }

    /**
     * 删除极光别名
     * @param $app_token
     * @param $alias
     * @return array
     * @throws \Exception
     */
    public function jgDelAlias($app_token, $alias)
    {
        if (empty($app_token) || empty($alias)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/jg-del-alias', [
            'app_token' => $app_token,
            'alias' => $alias,
        ]);
    }

    /**
     * 极光推送
     * @param $app_token
     * @param string $content 内容
     * @param string $alias 别名（一般为手机号）
     * @param string $jg_key
     * @param string $jg_secret
     * @param string $registration_id 极光分配的ID
     * @return array
     * @throws \Exception
     */
    public function jgPush($app_token, $content, $alias = null, $jg_key = null, $jg_secret = null, $registration_id = null)
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
            'jg_key' => $jg_key,
            'jg_secret' => $jg_secret,
            'alias' => $alias,
            'content' => $content
        ]);
    }

    /**
     * 站内通知消息推送
     * @param $app_token
     * @param $phone
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function sendNoticeMsg($app_token, $phone, $data = NoticeMsg::MSG_UNIVERSAL_STRUCTURE)
    {
        if (empty($app_token) || empty($phone) || empty($data)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/send-notice-msg', [
            'app_token' => $app_token,
            'phone' => $phone,
            'data' => $data,
        ]);
    }

    /**
     * 推送企业微信消息
     * @param $app_token
     * @param $phone
     * @param string $object
     * @param string[] $properties
     * @param $work_corp_id
     * @param $internal
     * @return array
     * @throws \Exception
     */
    public function sendWorkCorpMsg($app_token, $phone, $object = NoticeMsg::MSG_WORK_CORP_OBJECT_TEXT, $properties = NoticeMsg::MSG_WORK_CORP_PROPERTIES_TEXT, $work_corp_id = 0, $internal = NoticeMsg::APP_INTERNAL_YES)
    {
        if (empty($app_token) || empty($phone)) {
            throw new \Exception('缺失必要参数');
        }

        return $this->request('/app/send-work-corp-msg', [
            'app_token' => $app_token,
            'work_corp_id' => $work_corp_id,
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