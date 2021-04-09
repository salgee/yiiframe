<?php

namespace api\modules\v2\controllers;

use addons\Webuploader\common\traits\FileActions;
use api\controllers\OnAuthController;

/**
 * 资源上传控制器
 */
class FileController extends OnAuthController
{
    use FileActions;

    /**
     * @var string
     */
    public $modelClass = '';
}