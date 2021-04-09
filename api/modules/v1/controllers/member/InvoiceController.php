<?php

namespace api\modules\v1\controllers\member;

use api\controllers\UserAuthController;
use addons\Member\common\models\Invoice;

/**
 * 发票管理
 *
 * Class InvoiceController
 * @package api\modules\v1\controllers\member
 * @author YiiFrame <21931118@qq.com>
 */
class InvoiceController extends UserAuthController
{
    /**
     * @var Invoice
     */
    public $modelClass = Invoice::class;
}