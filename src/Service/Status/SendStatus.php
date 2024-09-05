<?php
namespace MlwSms\Service\Status;

use MlwSms\MlwSmsClient;

/**
 * 查询短信发送状态业务类
 */
class SendStatus
{
    protected $client;

    /**
     * SendStatus 构造函数
     *
     * @param MlwSmsClient $client 核心客户端实例
     */
    public function __construct(MlwSmsClient $client)
    {
        $this->client = $client;
    }

    /**
     * 查询发送状态
     *
     * @return mixed 响应结果
     */
    public function query()
    {
        return $this->client->sendRequest('/report/status');
    }
}
