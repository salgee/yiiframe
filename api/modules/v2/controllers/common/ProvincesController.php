<?php

namespace api\modules\v2\controllers\common;

use Yii;
use api\controllers\OnAuthController;
use addons\Provinces\common\models\Provinces;

/**
 * Class ProvincesController
 */
class ProvincesController extends OnAuthController
{
    /**
     * @var Provinces
     */
    public $modelClass = Provinces::class;

    /**
     * 获取省市区
     *
     * @param int $pid
     * @return array|yii\data\ActiveDataProvider
     */
    public function actionIndex()
    {
        $pid = Yii::$app->request->get('pid', 0);

        return Yii::$app->provincesService->provinces->getCityByPid($pid);
    }
}