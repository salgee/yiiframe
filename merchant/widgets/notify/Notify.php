<?php

namespace merchant\widgets\notify;

use Yii;
use yii\base\Widget;

/**
 * Class Notify
 * @package backend\widgets\notify
 * @author YiiFrame <21931118@qq.com>
 */
class Notify extends Widget
{
    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function run()
    {
        // 拉取公告
        Yii::$app->notifyService->notify->pullAnnounce(Yii::$app->user->id, Yii::$app->user->identity->created_at);
        // 拉取订阅
        if ($config = Yii::$app->notifyService->notifySubscriptionConfig->findByMemberId(Yii::$app->user->id)) {
            Yii::$app->notifyService->notify->pullRemind($config);
        }

        // 获取当前通知
        list($notify, $notifyPage) = Yii::$app->notifyService->notify->getUserNotify(Yii::$app->user->id);

        return $this->render('notify', [
            'notify' => $notify,
            'notifyPage' => $notifyPage,
        ]);
    }
}