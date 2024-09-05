<?php
namespace MlwSms\Config;

/**
 * 配置类，管理 API 访问密钥和基础 URL
 */
class Config
{
    protected $accesskey;
    protected $secret;
    protected $apiBaseUrl = 'http://api.1cloudsp.com'; // API 基础地址

    /**
     * Config 构造函数
     *
     * @param string $accesskey API 访问密钥
     * @param string $secret API 密钥
     */
    public function __construct($accesskey, $secret)
    {
        $this->accesskey = $accesskey;
        $this->secret = $secret;
    }

    /**
     * 获取 API 访问密钥
     *
     * @return string
     */
    public function getAccesskey()
    {
        return $this->accesskey;
    }

    /**
     * 获取 API 密钥
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * 获取 API 基础地址
     *
     * @return string
     */
    public function getApiBaseUrl()
    {
        return $this->apiBaseUrl;
    }
}
