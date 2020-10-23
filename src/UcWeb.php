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
    public function thirdUrl($app_url = '')
    {
        return $this->getUrl('/third?app_key=' . $this->app_key . '&app_url=' . urlencode($app_url));
    }

    /**
     * 同步登出
     * @param $app_url
     * @return string
     */
    public function thirdLogout($app_url = '')
    {
        return $this->getUrl('/third/logout?app_key=' . $this->app_key . '&app_url=' . urlencode($app_url));
    }
}