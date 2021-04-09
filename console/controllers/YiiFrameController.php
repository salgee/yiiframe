<?php

namespace console\controllers;

use yii\helpers\Console;
use yii\console\Controller;

/**
 * Class YiiFrameController
 * @package console\controllers
 * @author YiiFrame <21931118@qq.com>
 */
class YiiFrameController extends Controller
{
    public function actionUpdate()
    {
        Console::output('updating...');
    }
}