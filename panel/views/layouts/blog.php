<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

\app\assets\BlogAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<style>
    body {
        direction: rtl;
        text-align: right;
    }

    @keyframes hidePreloader {
        0% {
            width: 100%;
            height: 100%;
        }

        100% {
            width: 0;
            height: 0;
        }
    }

    body > div.preloader {
        position: fixed;
        background: white;
        width: 100%;
        height: 100%;
        z-index: 1071;
        opacity: 0;
        transition: opacity .5s ease;
        overflow: hidden;
        pointer-events: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    body:not(.loaded) > div.preloader {
        opacity: 1;
    }

    body:not(.loaded) {
        overflow: hidden;
    }

    body.loaded > div.preloader {
        animation: hidePreloader .5s linear .5s forwards;
    }
</style>
<script>
    window.addEventListener("load", function () {
        setTimeout(function () {
            document.querySelector('body').classList.add('loaded');
        }, 300);
    });
</script>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<?php $this->beginBody() ?>

<header class="header-transparent" id="header-main">
    <nav class="navbar navbar-main navbar-expand-lg shadow-lg navbar-light" id="navbar-main">
        <div class="container"><a class="navbar-brand"
                                  href="<?= Yii::$app->urlManager->createAbsoluteUrl('articles') ?>"><img alt="سهم آرمانی"
                                                                                                          src="../../assets/img/brand/light-mono.svg"
                                                                                                          id="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
                    aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse navbar-collapse-overlay" id="navbar-main-collapse">
                <div class="position-relative">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <ul class="navbar-nav align-items-sm-center d-lg-flex ml-lg-auto">

                    <?php
                    $categories = \app\modules\blog\models\Categories::find()->where(['parent_id' => 0])->all();

                    foreach ($categories as $category) {
                        ?>
                        <li class="nav-item "><a class="nav-link"
                                                 style="color: #294187 !important;font-size: 0.7rem !important;"
                                                 href="<?= Yii::$app->urlManager->createAbsoluteUrl('articles/' . $category->id . '/' . str_replace(' ', '-', $category->title)) ?>"><?= $category->title ?></a>
                        </li>
                        <?php
                    }
                    ?>


                </ul>
            </div>
        </div>
    </nav>
</header>
<?= $content ?>
<?php $this->endBody() ?>
</body>
<!---begin GOFTINO code--->
<!---start GOFTINO code--->
<script type="text/javascript">
    !function () {
        var a = window, d = document;

        function g() {
            var g = d.createElement("script"), s = "https://www.goftino.com/widget/EEYnRJ",
                l = localStorage.getItem("goftino");
            g.type = "text/javascript", g.async = !0, g.src = l ? s + "?o=" + l : s;
            d.getElementsByTagName("head")[0].appendChild(g);
        }

        "complete" === d.readyState ? g() : a.attachEvent ? a.attachEvent("onload", g) : a.addEventListener("load", g, !1);
    }();
</script>
<!---end GOFTINO code--->

<!---end GOFTINO code--->
</html>
<?php $this->endPage() ?>
