<?php

namespace Happyphper\TCaptcha\Requests;

class Params
{
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

    public static array $required = [
        'CaptchaType',
        'Ticket',
        'Randstr',
        'UserIp',
    ];

    public function __construct()
    {

    }

    public static function fromArray(array $data): Params
    {
        $item = new self();

        if (!empty($data['CaptchaType'])) {
            $item->captchaType = $data['CaptchaType'];
        }

        if (!empty($data['Ticket'])) {
            $item->ticket = $data['Ticket'];
        }

        if (!empty($data['UserIp'])) {
            $item->userIp = $data['UserIp'];
        }

        if (!empty($data['Randstr'])) {
            $item->randStr = $data['Randstr'];
        }

        if (!empty($data['BusinessId'])) {
            $item->businessId = $data['BusinessId'];
        }

        if (!empty($data['SceneId'])) {
            $item->sceneId = $data['SceneId'];
        }

        if (!empty($data['MacAddress'])) {
            $item->mac = $data['MacAddress'];
        }

        if (!empty($data['Imei'])) {
            $item->imei = $data['Imei'];
        }

        if (!empty($data['NeedGetCaptchaTime'])) {
            $item->needGetCaptchaTime = $data['NeedGetCaptchaTime'];
        }

        return $item;
    }

    public function toArray()
    {
        return [
            'CaptchaType'        => $this->captchaType,
            'Ticket'             => $this->ticket,
            'UserIp'             => $this->userIp,
            'Randstr'            => $this->randStr,
            'BusinessId'         => $this->businessId,
            'SceneId'            => $this->sceneId,
            'MacAddress'         => $this->mac,
            'Imei'               => $this->imei,
            'NeedGetCaptchaTime' => $this->needGetCaptchaTime,
        ];
    }
}
