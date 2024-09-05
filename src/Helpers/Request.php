<?php
namespace MlwSms\Helpers;

/**
 * 请求处理类，封装 HTTP 请求的逻辑
 */
class Request
{
    /**
     * 发起 POST 请求
     *
     * @param string $url 请求的 URL
     * @param array $params 请求参数
     * @return mixed 响应结果
     */
    public function post($url, array $params = [])
    {
        $headers = [
            "Content-Type: application/x-www-form-urlencoded",
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }
}
