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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
      public $css = [

        'dist/js/jquery-3.2.1.min.js',
        'dist/css/bootstrap.min.css',
        'dist/css/icofont.min.css',
        'dist/css/jquery.mCustomScrollbar.min.css',
        'dist/css/base.css',
        'dist/css/rtl.css',
        'dist/css/dashboard.css',
        'dist/css/jqx.base.css',
        'dist/css/jqx.darkblue.css',
        'dist/css/slick.css',
        'dist/css/slick-theme.css',
        'dist/css/persian-datepicker.min.css',
        'dist/js/jquery-3.2.1.min.js',
        'dist/css/order.css',
        'dist/css/bootstrap-treeview.css',
        'dist/css/all.min.css',
        'dist/css/select2.min.css',
        'dist/js/jquery-3.2.1.min.js',

    ];
    public $js = [


        'dist/js/popper.min.js',
        'dist/js/bootstrap.min.js',
        'dist/js/chart.min.js',
        'dist/js/scripts.js?v=1.2',
        'dist/js/jquery.mCustomScrollbar.min.js',
        'dist/js/jqxcore.js',
        'dist/js/jqxdraw.js',
        'dist/js/jqxbargauge.js',
        'dist/js/jqxgauge.js',
        'dist/js/jqxdata.js',
        'dist/js/jqxchart.core.js',
        'dist/js/slick.min.js',
        'dist/js/slick.min.js',
        'dist/js/slick.min.js',
        'dist/js/persian-date.min.js',
        'dist/js/persian-datepicker.min.js',
        'dist/js/scripts.js',
        'dist/js/jquery.mCustomScrollbar.min.js',
        'dist/js/bootstrap-treeview.js',
        'dist/js/shieldui-all.min.js',
        'dist/js/select2.min.js',


    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];
}
