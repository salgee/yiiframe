<?php

use common\helpers\Url;

$this->title = '首页';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<style>
    .info-box-number {
        font-size: 20px;
    }

    .info-box-content {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<div class="row">

    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-person-stalker "></i> <?= $member ?? 0 ?></span>
                <span class="info-box-text">用户人数(个)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i
                            class="icon glyphicon glyphicon-eye-open  red"></i> <?= $behavior ?? 0 ?></span>
                <span class="info-box-text">行为监控(次)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon glyphicon glyphicon-globe cyan"></i> <?= $logCount ?? 0 ?></span>
                <span class="info-box-text">全局日志(条)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i
                            class="icon glyphicon glyphicon-briefcase blue"></i> <?= $attachment ?? 0 ?></span>
                <span class="info-box-text">资源文件(个)</span>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i
                            class="icon glyphicon glyphicon-save-file  green"></i> <?= $attachmentSize ?? 0 ?>MiB</span>
                <span class="info-box-text">附件大小</span>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i
                            class="icon glyphicon glyphicon-tasks "></i> <?= $mysql_size ?? 0 ?></span>
                <span class="info-box-text">数据库大小</span>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-circle blue" style="font-size: 8px"></i>
                <h3 class="box-title">登陆统计</h3>
            </div>
            <?= \common\widgets\echarts\Echarts::widget([
                'config' => [
                    'server' => Url::to(['login-count']),
                    'height' => '400px'
                ]
            ]) ?>
        </div>
    </div>

</div>