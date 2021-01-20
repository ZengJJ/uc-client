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

    /**
     * @param $uri
     * @param array $params
     * @param string $method
     * @param bool $manual_handle
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($uri, $params = array(), $method = 'POST', $manual_handle = false)
    {
        $response = $this->client->request($method, $this->getUrl($uri), [
            'form_params' => $params
        ]);

        if (empty($response)) {
            throw new \Exception('请求失败');
        }
        if ($response->getStatusCode() != 200) {
            throw new \Exception('请求错误：' . $response->getStatusCode());
        }
        $result = json_decode($response->getBody(), true);
        if (empty($result)) {
            throw new \Exception('数据有误');
        }
        if ($manual_handle) { // 手动处理反馈结果
            return $result;
        }
        if ($result['code'] != 0) {
            throw new \Exception(empty($result['message']) ? '处理失败' : $result['message']);
        }

        return $result['data'];
    }
}