<?php


namespace ZengJJ\UcClient;


use Guzzle\Http\Client;

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
        $this->client->setBaseUrl($this->api_host);
    }

    /**
     * @param $uri
     * @param array $params
     * @param string $method
     * @return array
     * @throws \Exception
     */
    public function request($uri, $params = array(), $method = 'GET'): array
    {
        $request = $this->client->createRequest($method, $uri);
        if (!empty($params)) {
            $query = $request->getQuery();
            foreach ($params as $k => $v) {
                $query->set($k, $v);
            }
        }
        $response = $request->send();
        if (empty($response)) {
            throw new \Exception('请求失败');
        }
        if ($response->getStatusCode() != 200) {
            throw new \Exception('请求错误：' . $response->getStatusCode());
        }
        $result = json_decode($response->getBody(true), true);
        if (empty($result) || $result['code'] != 0) {
            throw new \Exception(empty($result['message']) ? '数据有误' : $result['message']);
        }

        return $result['data'];
    }

    /**
     * 同步用户数据
     * @param $token
     * @return array
     * @throws \Exception
     */
    public function sync($token)
    {
        if (empty($token)) {
            throw new \Exception('Token 不能为空');
        }
        return $this->request('/user/sync', ['token' => $token]);
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
            "host" => $_SERVER['HTTP_HOST'],
            "content" => $content ?: '错误',
            "data" => $data,
            "category" => $category,
            "level" => $level
        ], 'POST');
    }
}