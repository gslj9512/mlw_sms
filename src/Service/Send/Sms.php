<?php
namespace MlwSms\Service\Send;

use MlwSms\MlwSmsClient;

/**
 * 发送群发短信业务类
 */
class Sms
{
    protected $client;

    /**
     * Sms 构造函数
     *
     * @param MlwSmsClient $client 核心客户端实例
     */
    public function __construct(MlwSmsClient $client)
    {
        $this->client = $client;
    }

    /**
     * 发送短信
     *
     * @param string $sign 短信签名
     * @param string $mobile 手机号
     * @param string $content 短信内容
     * @param string $data 额外数据
     * @param string $templateId 模板 ID
     * @param string $scheduleSendTime 定时发送时间
     * @return mixed 响应结果
     */
    public function send($sign, $mobile = '', $content = '', $data = '', $templateId = '', $scheduleSendTime = '')
    {
        $params = [
            'sign' => $sign,
            'mobile' => $mobile,
            'content' => $content,
            'data' => $data,
            'templateId' => $templateId,
            'scheduleSendTime' => $scheduleSendTime
        ];
        return $this->client->sendRequest('/api/v2/send', $params);
    }
}
