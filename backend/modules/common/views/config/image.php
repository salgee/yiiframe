<?php

use common\helpers\Html;
use common\enums\StatusEnum;
use common\helpers\AddonHelper;
?>

<div class="form-group">
    <?= Html::label($row['title'], $row['name'], ['class' => 'control-label demo']); ?>
    <?php if ($row['is_hide_remark'] != StatusEnum::ENABLED) { ?>
        <small><?= \yii\helpers\HtmlPurifier::process($row['remark']) ?></small>
    <?php } ?>
    <div class="col-sm-push-10">
        <?php
        if(AddonHelper::isInstall('Webuploader'))
        echo \addons\Webuploader\common\widgets\webuploader\Files::widget([
            'name' => "config[" . $row['name'] . "]",
            'value' => $row['value']['data'] ?? $row['default_value'],
            'type' => 'images',
            'theme' => 'default',
            'config' => [
                'pick' => [
                    'multiple' => false,
                ],
            ]
        ]) ?>
    </div>
</div>