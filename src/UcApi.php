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
     * 请求
     * @param $uri
     * @param array $params
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function request($uri, $params = array(), $method = 'GET')
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
        if (empty($result) || $result['code'] != 0) {
            throw new \Exception(empty($result['message']) ? '数据有误' : $result['message']);
        }

        return $result['data'];
    }
}