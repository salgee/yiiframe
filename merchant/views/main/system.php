<?php

use common\helpers\Url;

$this->title = '首页';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="row">
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon fa fa-user-plus blue"></i> <?= $memberCount??0 ?></span>
                <span class="info-box-text">会员人数(个)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-person-stalker "></i> <?= $employeesCount??0 ?></span>
                <span class="info-box-text">员工人数(个)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon fa fa-clock-o  yellow"></i> <?= $worksCount??0 ?></span>
                <span class="info-box-text">待办工作(件)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon icon fa fa-clock-o  green"></i> <?= $completedCount??0 ?></span>
                <span class="info-box-text">已办工作(件)</span>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-card "></i> <?= $assetsCount??0 ?></span>
                <span class="info-box-text">总资产(元)</span>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xs-12">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-circle blue" style="font-size: 8px"></i>
                <h3 class="box-title">签到统计</h3>
            </div>
            <?= \common\widgets\echarts\Echarts::widget([
                'config' => [
                    'server' => Url::to(['merchants/base/member/check-in']),
                    'height' => '315px'
                ]
            ]) ?>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-circle blue" style="font-size: 8px"></i>
                <h3 class="box-title">签退统计</h3>
            </div>
            <?= \common\widgets\echarts\Echarts::widget([
                'config' => [
                    'server' => Url::to(['merchants/base/member/check-out']),
                    'height' => '315px'
                ]
            ]) ?>
        </div>
    </div>
</div>