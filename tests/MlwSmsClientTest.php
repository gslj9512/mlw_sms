<?php
use PHPUnit\Framework\TestCase;
use MlwSms\Config\Config;
use MlwSms\Helpers\Request;
use MlwSms\MlwSmsClient;
use MlwSms\Service\Application;

class MlwSmsClientTest extends TestCase
{
    protected $client;

    protected function setUp(): void
    {
        $config = new Config('test_accesskey', 'test_secret');
        $request = new Request();
        $this->client = new MlwSmsClient($config, $request);
    }

    public function testVerifyCodeService()
    {
        $app = new Application($this->client);
        $verifyCodeService = $app->getVerifyCodeService();
        $response = $verifyCodeService->send('18912345678', '1234##5', '【测试短信】', '178855');
        $this->assertIsArray($response);
    }
}
