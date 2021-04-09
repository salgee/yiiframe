<?php

namespace merchant\controllers;

use common\helpers\ResultHelper;
use Yii;

/**
 * 主控制器
 *
 * Class MainController
 * @package merchant\controllers
 * @author YiiFrame <21931118@qq.com>
 */
class MainController extends BaseController
{
    /**
     * 系统首页
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->renderPartial($this->action->id, [
        ]);
    }

    /**
     * 子框架默认主页
     *
     * @return string
     */
    public function actionSystem()
    {

        return $this->render($this->action->id, [
            'memberCount' => Yii::$app->merchantsService->system->getMember(Yii::$app->services->merchant->getId()),
            'employeesCount' => Yii::$app->merchantsService->system->getEmployees(Yii::$app->services->merchant->getId()),
            'worksCount' => Yii::$app->merchantsService->system->getWorks(Yii::$app->services->merchant->getId()),
            'completedCount' => Yii::$app->merchantsService->system->getCompleted(Yii::$app->services->merchant->getId()),
            'assetsCount' => Yii::$app->merchantsService->system->getAssets(),
        ]);
    }

    public function actionCheckIn($type)
    {
        $data = Yii::$app->merchantsService->system->getSignIn($type);
        return ResultHelper::json(200, '获取成功', $data);
    }
    public function actionCheckOut($type)
    {
        $data = Yii::$app->merchantsService->system->getSignOut($type);
        return ResultHelper::json(200, '获取成功', $data);
    }
}