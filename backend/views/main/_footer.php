<footer class="main-footer" style="position: fixed;left: 0;bottom: 0;width: 100%;z-index: 9999;">
    <div class="pull-right hidden-xs" style="margin-right: 200px">
        <?= Yii::$app->debris->backendConfig('web_copyright'); ?> <?= Yii::$app->debris->backendConfig('web_visit_code'); ?>
    </div>
    当前版本：<?= Yii::$app->debris->version()['version']; ?>
</footer>