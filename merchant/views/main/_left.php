<?php

use common\helpers\ImageHelper;
use common\widgets\menu\MenuLeftWidget;

?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img class="img-circle head_portrait" src="<?= ImageHelper::defaultHeaderPortrait($manager->head_portrait); ?>"/>
            </div>
            <div class="pull-left info">
                <p><?= $manager->username; ?></p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i>
                    <?php if (Yii::$app->services->auth->isSuperAdmin()) { ?>
                        超级管理员
                    <?php } else { ?>
                        <?= Yii::$app->services->rbacAuthRole->getTitle() ?>
                    <?php } ?>
                </a>
            </div>
        </div>
        <!-- 侧边菜单 -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" data-rel="external">系统菜单</li>
            <?= MenuLeftWidget::widget(); ?>
            <?php if (Yii::$app->debris->getAllInfo(true, \common\enums\AppEnum::MERCHANT,  Yii::$app->services->merchant->getMerchantId())['sys_related_links']??false){ ?>
                <li class="header" data-rel="external">相关链接</li>
                <li><a href="<?= $merchants->url?>" target="_blank"><i class="fa fa-bookmark text-red"></i> <span>系统官网</span></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-list text-yellow"></i> <span>在线文档</span></a></li>
                <li><a href="#" target="_blank"><i class="fa fa-qq text-aqua"></i> <span>QQ群 <?= $merchants->qq ?></span></a></li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>