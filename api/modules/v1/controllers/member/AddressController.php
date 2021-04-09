<?php

namespace api\modules\v1\controllers\member;

use api\controllers\UserAuthController;
use addons\Member\common\models\Address;

/**
 * 收货地址
 *
 * Class AddressController
 * @package api\modules\v1\controllers\member
 * @property \yii\db\ActiveRecord $modelClass
 * @author YiiFrame <21931118@qq.com>
 */
class AddressController extends UserAuthController
{
    /**
     * @var Address
     */
    public $modelClass = Address::class;
}
