<?php

namespace api\modules\v1\controllers;

use addons\Webuploader\common\traits\FileActions;
use api\controllers\OnAuthController;

/**
 * 资源上传控制器
 *
 * Class FileController
 * @package api\modules\v1\controllers
 * @property \yii\db\ActiveRecord $modelClass
 * @author YiiFrame <21931118@qq.com>
 */
class FileController extends OnAuthController
{
    use FileActions;

    /**
     * @var string
     */
    public $modelClass = '';
}