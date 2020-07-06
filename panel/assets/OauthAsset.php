<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;


/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */


class OauthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'dist/css/bootstrap.min.css',
        'dist/css/icofont.min.css',
        'dist/css/base.css',
        'dist/css/rtl.css',
        'dist/css/authentication.css'


    ];
    public $js = [
        'dist/js/jquery-3.2.1.min.js',
        'dist/js/popper.min.js',
        'dist/js/bootstrap.min.js',
        ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
