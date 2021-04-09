<?php

namespace api\modules\v2\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;
use api\controllers\OnAuthController;
use common\enums\StatusEnum;
use addons\Merchants\common\models\Merchant;
use common\helpers\ArrayHelper;
use addons\Merchants\common\models\forms\MerchantSearch;

/**
 * Class MerchantController
 * @package addons\Merchants\api\modules\v1\controllers
 * @author YiiFrame <21931118@qq.com>
 */
class MerchantController extends OnAuthController
{
    /**
     * @var Merchant
     */
    public $modelClass = Merchant::class;

    /**
     * 不用进行登录验证的方法
     * 例如： ['index', 'update', 'create', 'view', 'delete']
     * 默认全部需要验证
     *
     * @var array
     */
    protected $authOptional = ['index', 'view'];

    /**
     * @return array|ActiveDataProvider|\yii\db\ActiveRecord[]
     */
    public function actionIndex()
    {
        $model = new MerchantSearch();
        $model->attributes = Yii::$app->request->get();

        return $this->getListBySearch($model);
    }

    /**
     * @param MerchantSearch $search
     * @return array|\yii\db\ActiveRecord[]
     */
    protected function getListBySearch(MerchantSearch $search)
    {
        $orderBy = ArrayHelper::merge($search->getOrderBy(), ['sort asc', 'id desc']);

        // 所有下级分类
        $cate_ids = [];
        if ($cate_id = $search->cate_id) {
            $cate_ids = Yii::$app->merchantsService->cate->findChildIdsById($cate_id);
        }

        $data = $this->modelClass::find()
            ->select($search->getSelect())
            ->where(['status' => StatusEnum::ENABLED, 'state' => StatusEnum::ENABLED])
            ->andFilterWhere(['like', 'title', $search->keyword])
            ->andFilterWhere(['is_recommend' => $search->is_recommend])
            ->andFilterWhere(['in', 'cate_id', $cate_ids]);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $this->pageSize, 'validatePage' => false]);
        $models = $data->offset($pages->offset)
            ->orderBy(implode(',', $orderBy))
            ->asArray()
            ->limit($pages->limit)
            ->all();

        foreach ($models as &$model) {
            !isset($model['distance']) && $model['distance'] = 0;
            $model['distance'] = round($model['distance'], 2);
        }

        return $models;
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
        if (in_array($action, ['update', 'create', 'delete'])) {
            throw new \yii\web\BadRequestHttpException('权限不足');
        }
    }

    /**
     * @param $id
     * @return \yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        /* @var $model \yii\db\ActiveRecord */
        if (empty($id) || !($model = $this->modelClass::find()->where([
                'id' => $id,
                'status' => StatusEnum::ENABLED,
            ])->one())) {
            throw new NotFoundHttpException('请求的数据不存在');
        }

        return $model;
    }
}