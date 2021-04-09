<?php

namespace api\modules\v2\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use api\controllers\OnAuthController;
use common\enums\StatusEnum;
use common\helpers\EchantsHelper;
use common\helpers\ResultHelper;
use yii\db\ActiveQuery;

/**
 * 会员接口
 */
class MemberController extends OnAuthController
{

    public $modelClass = '';
    /**
     * 个人中心
     */
    public function actionIndex()
    {
        $id = Yii::$app->user->identity->member_id;
        if (Yii::$app->services->devPattern->isB2B2C())
            $model = \addons\Merchants\common\models\Member::class;
        else if (Yii::$app->services->devPattern->isB2C())
            $model = \common\models\backend\Member::class;
        else if (Yii::$app->services->devPattern->isSAAS())
            $model = \common\models\backend\Member::class;
        $member = $model::find()->alias('m')
            ->where(['m.id' => $id])
            ->with(['assignment'])
//            ->with(['merchant','assignment','department'])
            ->joinWith(['role'])
            ->asArray()
            ->one();

        return $member;
    }

    /**
     * 更新
     *
     * @param $id
     * @return bool|mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->attributes = Yii::$app->request->post();
        if (!$model->save()) {
            return ResultHelper::json(422, $this->getError($model));
        }
        //避免返回敏感信息
        return ResultHelper::json(200, 'OK');
    }
    /**
     * 单个显示
     *
     * @param $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        if (Yii::$app->services->devPattern->isB2B2C())
            $model = \addons\Merchants\common\models\Member::class;
        else if (Yii::$app->services->devPattern->isB2C())
            $model = \common\models\backend\Member::class;
        else if (Yii::$app->services->devPattern->isSAAS())
            $model = \common\models\backend\Member::class;
        $member = $model::find()
            ->where(['id' => $id, 'status' => StatusEnum::ENABLED])
            ->select([
                'id', 'username', 'nickname',
                'realname', 'head_portrait', 'gender',
                'qq', 'email', 'birthday',
                'user_money', 'user_integral', 'status',
                'created_at'
            ])
            ->asArray()
            ->one();

        if (!$member) {
            throw new NotFoundHttpException('请求的数据不存在或您的权限不足.');
        }

        return $member;
    }
    protected function findModel($id)
    {
        if (Yii::$app->services->devPattern->isB2B2C())
            $model = \addons\Merchants\common\models\Member::class;
        else if (Yii::$app->services->devPattern->isB2C())
            $model = \common\models\backend\Member::class;
        else if (Yii::$app->services->devPattern->isSAAS())
            $model = \common\models\backend\Member::class;
        if (empty($id) || !($member = $model::find()->where([
                'id' => $id,
                'status' => StatusEnum::ENABLED,
            ])->andFilterWhere(['merchant_id' => $this->getMerchantId()])->one())) {
            throw new NotFoundHttpException('请求的数据不存在');
        }

        return $member;
    }
    /**
     * 权限验证
     *
     * @param string $action 当前的方法
     * @param null $model 当前的模型类
     * @param array $params $_GET变量
     * @throws \yii\web\BadRequestHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        // 方法名称
        if (in_array($action, ['delete'])) {
            throw new \yii\web\BadRequestHttpException('权限不足');
        }
    }
}
