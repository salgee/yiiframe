<?php

namespace html5\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * @package html5\assets
 * @author YiiFrame <21931118@qq.com>
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//         'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
