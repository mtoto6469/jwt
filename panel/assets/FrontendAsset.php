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


class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets/dist/assets/libs/swiper/dist/css/swiper.min.cs',
        'assets/dist/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css',
        'assets/dist/assets/libs/@fortawesome/fontawesome-free/css/all.min.css',
        'assets/dist/assets/css/quick-website.css',
        'assets/dist/assets/css/font-front.css',
        'assets/dist/assets/libs/animate.css/animate.min.css'
    ];
    public $js = [
        'assets/dist/assets/libs/typed.js/lib/typed.min.js',

        'assets/dist/assets/libs/jquery/dist/jquery.min.js',
        'assets/dist/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js',
        'assets/dist/assets/libs/in-view/dist/in-view.min.js',
        'assets/dist/assets/libs/sticky-kit/dist/sticky-kit.min.js',
        'assets/dist/assets/libs/svg-injector/dist/svg-injector.min.js',
        'assets/dist/assets/libs/feather-icons/dist/feather.min.js',
        'assets/dist/assets/libs/imagesloaded/imagesloaded.pkgd.min.js',

        'assets/dist/assets/libs/apexcharts/dist/apexcharts.min.js',
        'assets/dist/assets/libs/progressbar.js/dist/progressbar.min.js',
        'assets/dist/assets/libs/jquery.scrollbar/jquery.scrollbar.min.js',
        'assets/dist/assets/libs/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
        'assets/dist/assets/libs/swiper/dist/js/swiper.min.js',
        'assets/dist/assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js',
        'assets/dist/assets/js/quick-website.js',
        'assets/dist/assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
