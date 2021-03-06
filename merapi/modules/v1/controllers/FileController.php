<?php

namespace merapi\modules\v1\controllers;

use addons\Webuploader\common\traits\FileActions;
use merapi\controllers\OnAuthController;

/**
 * 资源上传控制器
 *
 * Class FileController
 * @package merapi\modules\v1\controllers
 * @property \yii\db\ActiveRecord $modelClass
 * @author YiiFrame <21931118@qq.com>
 */
class FileController extends OnAuthController
{
    use FileActions;

    public $modelClass = '';
}