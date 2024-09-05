<?php
namespace MlwSms;

use MlwSms\Config\Config;
use MlwSms\Helpers\Request;

/**
 * 核心请求和密钥管理类
 */
class MlwSmsClient
{
    protected $config;
    protected $request;

    /**
     * MlwSmsClient 构造函数
     *
     * @param Config $config 配置实例
     * @param Request $request 请求处理实例
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->request = new Request();
    }

    /**
     * 发起请求
     *
     * @param string $endpoint API 端点
     * @param array $params 请求参数
     * @return mixed 响应结果
     */
    public function sendRequest($endpoint, array $params = [])
    {
        $url = $this->config->getApiBaseUrl() . $endpoint;
        $params = array_merge($this->getAuthParams(), $params);
        return $this->request->post($url, $params);
    }

    /**
     * 获取认证参数
     *
     * @return array 认证参数
     */
    protected function getAuthParams()
    {
        return [
            'accesskey' => $this->config->getAccesskey(),
            'secret' => $this->config->getSecret(),
        ];
    }
}
