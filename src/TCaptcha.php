<?php

namespace Happyphper\TCaptcha;

use Happyphper\TCaptcha\Exceptions\HttpException;
use Happyphper\TCaptcha\Exceptions\ParamException;
use Happyphper\TCaptcha\Requests\Params;
use TencentCloud\Captcha\V20190722\CaptchaClient;
use TencentCloud\Captcha\V20190722\Models\DescribeCaptchaResultRequest;
use TencentCloud\Common\Credential;
use TencentCloud\Common\Exception\TencentCloudSDKException;


class TCaptcha
{
    private string       $secretId;
    private string       $secretKey;
    private int          $captchaAppId;
    private string       $captchaSecretKey;
    private string       $region;
    public CaptchaClient $client;

    /**
     * @throws ParamException
     */
    public function __construct()
    {
        $flag = config('tcaptcha.secret_id') && config('tcaptcha.secret_key') && config('tcaptcha.captcha_app_id') && config('tcaptcha.captcha_secret_key') && config('tcaptcha.region');
        if (!$flag) {
            throw new ParamException("请配置环境密钥");
        }

        $this->secretId         = config('tcaptcha.secret_id');
        $this->secretKey        = config('tcaptcha.secret_key');
        $this->captchaAppId     = intval(config('tcaptcha.captcha_app_id'));
        $this->captchaSecretKey = config('tcaptcha.captcha_secret_key');
        $this->region           = config('tcaptcha.region');
        $cred                   = new Credential($this->secretId, $this->secretKey);
        $this->client           = new CaptchaClient($cred, $this->region);
    }

    /**
     * @param Params $reqParams
     *
     * @return mixed|string
     * @throws ParamException
     * @throws HttpException
     */
    public function Validate(Params $reqParams): array
    {
        $data = $reqParams->toArray();

        $data = array_filter($data);

        // 参数校验：必填参数
        foreach ($data as $key => $value) {
            // 如果必填，且值为空则异常
            if (!$value) {
                if (in_array($key, Params::$required)) {
                    throw new ParamException("{$key} 必填，且不能为空");
                }

            }
        }

        // 添加密钥信息
        $data['CaptchaAppId'] = $this->captchaAppId;
        $data['AppSecretKey'] = $this->captchaSecretKey;

        try {
            $req = new DescribeCaptchaResultRequest();

            $req->fromJsonString(json_encode($data));

            $resp = $this->client->DescribeCaptchaResult($req);

            $resp->toJsonString();

            return [
                'ok'  => $resp->getCaptchaCode() === 1,
                'raw' => $resp,
            ];
        } catch (TencentCloudSDKException $exception) {
            throw new HttpException($exception->getMessage(), $exception->getRequestId(), $exception->getPrevious());
        }
    }
}
