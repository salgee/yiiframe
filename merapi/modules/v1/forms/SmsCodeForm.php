<?php

namespace merapi\modules\v1\forms;

use common\helpers\AddonHelper;
use Yii;
use yii\base\Model;
use common\helpers\RegularHelper;
use addons\AliyunSms\common\models\SmsLog;

/**
 * Class SmsCodeForm
 * @package merapi\modules\v1\forms
 * @author YiiFrame <21931118@qq.com>
 */
class SmsCodeForm extends Model
{
    /**
     * @var
     */
    public $mobile;

    /**
     * @var
     */
    public $usage;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['mobile', 'usage'], 'required'],
            [['usage'], 'in', 'range' => array_keys(SmsLog::$usageExplain)],
            ['mobile', 'match', 'pattern' => RegularHelper::mobile(), 'message' => '请输入正确的手机号'],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'mobile' => '手机号码',
            'usage' => '用途',
        ];
    }

    /**
     * @throws \yii\web\UnprocessableEntityHttpException
     */
    public function send()
    {
        $code = rand(1000, 9999);
        if(AddonHelper::isInstall('AliyunSms'))
        return Yii::$app->aliyunSmsService->sms->send($this->mobile, $code, $this->usage);
    }
}