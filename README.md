# TCaptcha 腾讯云验证码组件

TencentCloud Captcha for Laravel
Laravel版本的腾讯云验证码组件

## Quick Start 快速开始

1. Install 安装

```
composer require happyphper/tcaptcha
```

2. Config 配置

```
php artisan vendor:publish
```

3. Env 环境变量

```
TENCENT_SECRET_ID=
TENCENT_SECRET_KEY=
TENCENT_CAPTCHA_APP_ID=
TENCENT_CAPTCHA_SECRET_KEY=
TENCENT_CAPTCHA_REGION=ap-beijing
```

4. Use 使用

```
    try {
        $params = \Happyphper\TCaptcha\ReqParams::fromArray([
            'CaptchaType' => 9,
            'Ticket'      => "t03Luf5ZBWSMx9ukgVy06PI_2iiO_o4MCSZhLERRya4WL46L68ulKme-4j_wJuzr6gbMP2ez4VvNxgZ6oAKFv5dySH7GxpptcZU88wIW3vG9mIOCn7LGbBJuw**",
            'UserIp'      => request()->ip(),
            'Randstr'     => "@ibL",
        ]);

        [$ok, $response] = app('tcaptcha')->Validate($params);
        
        // true
        dump($ok);

        // {"CaptchaCode":1,"CaptchaMsg":"OK","EvilLevel":0,"GetCaptchaTime":0,"RequestId":"d42a0113-b51c-4ff5-bfd9-cca215d3dcc4"}
        dump($response);

    } catch (\Happyphper\TCaptcha\ParamException $exception) {
        // Miss Parameters 参数缺失

    } catch (\Happyphper\TCaptcha\HttpException $exception) {
        // TencentCloud Server Error

    }
```

## Params Description 参数说明

```
    // 验证码类型，固定值为9，必填
    public int $captchaType = 9;
    // 票据，前端获得，滑动验证码成功后，必填
    public string $ticket = "";
    // 访问IP，必填
    public string $userIp = "";
    // 随机字符串，前端获得，滑动验证码成功后，必填
    public string $randStr = "";
    // 业务ID
    public int $businessId = 0;
    // 场景ID
    public int $sceneId = 0;
    // MacAddress mac地址
    public string $mac = "";
    // 手机设备号
    public string $imei = "";
    // 是否返回前端获取验证码时间，值为1
    public int $needGetCaptchaTime = 1;
```

## Office Docs 官方文档

[https://cloud.tencent.com/document/api/1110/36926](https://cloud.tencent.com/document/api/1110/36926)

[https://console.cloud.tencent.com/api/explorer?Product=captcha](https://console.cloud.tencent.com/api/explorer?Product=captcha)
