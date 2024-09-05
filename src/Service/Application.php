<?php
namespace MlwSms\Service;

use MlwSms\MlwSmsClient;
use MlwSms\Service\Send\VerifyCode;
use MlwSms\Service\Send\Sms;
use MlwSms\Service\Status\SendStatus;

/**
 * 统一管理服务入口
 */
class Application
{
    protected $client;

    /**
     * Application 构造函数
     *
     * @param MlwSmsClient $client 核心客户端实例
     */
    public function __construct(MlwSmsClient $client)
    {
        $this->client = $client;
    }

    /**
     * 获取发送验证码服务
     *
     * @return VerifyCode
     */
    public function getVerifyCodeService()
    {
        return new VerifyCode($this->client);
    }

    /**
     * 获取发送短信服务
     *
     * @return Sms
     */
    public function getSmsService()
    {
        return new Sms($this->client);
    }

    /**
     * 获取短信状态查询服务
     *
     * @return SendStatus
     */
    public function getSendStatusService()
    {
        return new SendStatus($this->client);
    }
}
