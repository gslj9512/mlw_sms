<?php
namespace MlwSms\Service\Send;

use MlwSms\MlwSmsClient;

/**
 * 发送验证码业务类
 */
class VerifyCode
{
    protected $client;

    /**
     * VerifyCode 构造函数
     *
     * @param MlwSmsClient $client 核心客户端实例
     */
    public function __construct(MlwSmsClient $client)
    {
        $this->client = $client;
    }

    /**
     * 发送验证码
     *
     * @param string $mobile 手机号
     * @param string $content 短信内容
     * @param string $sign 短信签名
     * @param string $templateId 模板 ID
     * @return mixed 响应结果
     */
    public function send($mobile, $content, $sign, $templateId)
    {
        $params = [
            'mobile' => $mobile,
            'content' => $content,
            'sign' => $sign,
            'templateId' => $templateId
        ];
        return $this->client->sendRequest('/api/v2/single_send', $params);
    }
}
