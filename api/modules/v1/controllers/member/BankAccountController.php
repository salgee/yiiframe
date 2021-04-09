<?php

namespace api\modules\v1\controllers\member;

use api\controllers\UserAuthController;
use addons\Pay\common\models\BankAccountForm;

/**
 * 提现账号
 *
 * Class BankAccountController
 * @package api\modules\v1\controllers\member
 * @author YiiFrame <21931118@qq.com>
 */
class BankAccountController extends UserAuthController
{
    /**
     * @var BankAccountForm
     */
    public $modelClass = BankAccountForm::class;
}