# MlwSms PHP SDK

MlwSms PHP SDK 是一个 PHP 包，旨在简化与 MlwSms 短信服务的集成。此库封装了与 106 API 的交互，包括发送短信、查询状态等功能。

## 功能

- **发送短信**: 支持发送验证码短信、群发短信和国际短信。
- **查询状态**: 获取短信发送状态和回复列表。

## 安装
使用 Composer 安装此包：
```
composer require mlw/sms
```

## 配置

在使用前，你需要配置 `Config` 类来设置 API 密钥和基本 API URL。请参考以下示例：

使用 `Config` 类创建配置实例，设置你的 API 密钥和基本 API URL。然后创建 `Request` 实例，并用它们创建 `MlwSmsClient` 实例。最后，你可以通过 `Application` 类获取服务实例。

```php
use MlwSms\Config\Config;
use MlwSms\Helpers\Request;
use MlwSms\MlwSmsClient;
use MlwSms\Service\Application;

// 创建配置实例
$config = new Config('your_access_key', 'your_secret_key');
// 创建客户端实例
$client = new MlwSmsClient($config, $request);
// 获取应用服务
$app = new Application($client);
```

## 使用示例

### 发送验证码短信

使用 `VerifyCodeService` 服务的 `send` 方法发送验证码短信

## 请求参数

| 参数名       | 类型   | 必填 | 示例           | 说明                                                     |
|--------------|--------|------|----------------|----------------------------------------------------------|
| mobile        | String | 是   | 13900000000     | 接收短信的手机号码（只支持单个手机号）。                           |
| content       | String | 是   | 先生##9:40##快递公司##1234567 | 发送的短信内容是模板变量内容，多个变量中间用 `##` 或 `$$` 隔开，采用 UTF-8 编码。单个变量限制为 1-20 个字。 |
| sign          | String | 是   | 【测试签名】    | 平台上申请的接口短信签名或者签名 ID（须审核通过），采用 UTF-8 编码。 |
| templateId    | String | 是   | 123456          | 平台上申请的接口短信模板 ID（须审核通过）。                      |

```php
$verifyCodeService = $app->getVerifyCodeService();
$response = $verifyCodeService->send('18912345678', '1234##5', '【测试短信】', '178855');
print_r($response);
```

## 目录结构
```perl
mlw-sms/
├── src/
│   ├── MlwSmsClient.php              # 核心请求和密钥管理类
│   ├── Config/
│   │   └── Config.php                    # 配置类，用于管理密钥、API URL等
│   ├── Service/
│   │   ├── Application.php               # 统一管理服务入口
│   │   ├── Send/
│   │   │   ├── VerifyCode.php            # 发送验证码业务
│   │   │   ├── Sms.php                   # 发送群发短信业务
│   │   ├── Status/
│   │   │   ├── SendStatus.php            # 查询短信发送状态业务
│   └── Helpers/
│       └── Request.php                   # HTTP 请求处理类
├── tests/                                # 单元测试文件
│   └── MlwSmsClientTest.php
├── composer.json                         # Composer 配置文件
└── README.md                             # 文档

```
