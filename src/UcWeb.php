<?php


namespace ZengJJ\UcClient;

class UcWeb extends ObjectBase
{
    /**
     * 第三方链接
     * @param $app_key
     * @param $app_url
     * @return string
     */
    public function thirdUrl($app_key, $app_url)
    {
        return $this->getUrl('/third?app_key=' . $app_key . '&app_url=' . urlencode($app_url));
    }

    /**
     * 同步登出
     * @param $token
     * @return array
     * @throws \Exception
     */
    public function syncLogout()
    {
        return $this->request('/third/logout');
    }
}