<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\models\Profiles;
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
//exit;

$url = Yii::$app->urlManager;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script
            src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <?php $this->head() ?>

    <?php
    //    $model = \app\models\Profiles::find()->where(['user_id'=>Yii::$app->user->getId()])->one();

    //    $const = new \backend\controllers\ManageConstant();
    ?>

</head>

<style>
    * {
        font-size: 0.9rem;
    }

    .help-block {
        color: red;
    }

    th a {
        color: white;
    }

    .table-bordered:not(.detail-view) {
        text-align: center;
    }
</style>

<body class="dashboard fanum">

<?php $this->beginBody() ?>

<header class="mb-4 py-3 bg-white border-bottom fixed-top mb-5" style="z-index: 2!important;">
    <div class="container-fluid">
        <div class="row">
            <div class="d-none d-lg-block col-4 col-lg-3 col-xl-2"></div>
            <div class="col-12 col-8 col-lg-9 col-xl-10">
                <DIV CLASS="ROW">
                    <DIV CLASS="COL">
                        <?PHP
                        //                        $CLIENT = NEW \YII\HTTPCLIENT\CLIENT(['BASEURL' => $CONST->GETURLAPI()]);
                        //                        $RESPONSE = $CLIENT->GET('HTTPS://API.KAVENEGAR.COM/V1/6279396471642F6830456A6E5A4166585970547138773D3D/CLIENT/FETCH.JSON',['APIKEY'=>$MODEL->API_KEY])->SEND();
                        ?>
                        <!--                        <A CLASS="BTN FLOAT-RIGHT MR-5"-->
                        <!--                           STYLE="BORDER-RADIUS: 5PX;BORDER: 1PX SOLID #007BFF;COLOR: WHITE;BACKGROUND-COLOR: #007BFF">اعتبارحساب-->
                        <!--                            :<SPAN CLASS="MR-2">-->
                        <? //= YII::$APP->FORMATTER->ASCURRENCY(10000, '') ?><!--</SPAN><SPAN-->
                        <!--                                    CLASS="MR-2">ریال</SPAN></A>-->
                        <!---->
                        <!--                        <A CLASS="BTN FLOAT-LEFT ML-5"-->
                        <!--                           STYLE="BORDER-RADIUS: 5PX;BORDER: 1PX SOLID #007BFF;COLOR: WHITE;BACKGROUND-COLOR: #007BFF"><SPAN-->
                        <!--                                    CLASS="MR-3">شماره های تماس : </SPAN><SPAN>09906565397-09120890801</SPAN></A>-->
                        <!--                        <A CLASS="BTN FLOAT-LEFT ML-5"-->
                        <!--                           STYLE="BORDER-RADIUS: 5PX;BORDER: 1PX SOLID #2ECC71;COLOR: WHITE;BACKGROUND-COLOR: #2ECC71"><SPAN-->
                        <!--                                    CLASS="MR-3">تیکت و پشتیبانی</SPAN></A>-->

                    </DIV>

                </DIV>

            </div>
        </div>
    </div>
</header>
<br>
<div class="container-fluid" id="main-container mt-5" style="margin-top: 3.5rem">
    <div class="row" id="main-row">
        <div class="d-none d-lg-block col-4 col-lg-3 col-xl-2">
            <div class="sidebar bg-white shadow">
                <div class="sidebar-inner">
                    <div class="row h-100 no-gutters">
                        <div class="col">
                            <div class="sidebarlogo">
                                <a href=""><img src="" class="img-fluid"/></a>
                            </div>
                            <div class="text-center mt-4">
                                <div class="d-inline-block rounded-circle p-1 bg-white">
                                    <img src="<?= Yii::$app->homeUrl ?>dist/img/avatar.png" alt="avatar no photo"
                                         width="70"
                                         height="70"
                                         class="rounded-circle shadow img-fluid"/>
                                </div>
                                <?php
                                    // $model =  Profiles::find()->where(['userId'=>Yii::$app->user->identity['id']])->one();

                                ?>
                                <h3 class="mt-4 text-info"><?= isset($model) ? $model->name.' '.$model->lastName : Yii::$app->user->identity['username']?></h3>
                                <ul class="nav p-0 m-0 justify-content-center">

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= $url->createAbsoluteUrl(['profiles/update']) ?>">
                                            <i class="icofont align-middle">ui_user</i><?=Yii::t('app','Profile')?></a>
                                    </li>
                                      <li class="nav-item">
                                        <a class="nav-link" href="<?= $url->createAbsoluteUrl(['profiles/update']) ?>">
                                            <i class="icofont align-middle">ui_edit</i><?=Yii::t('app','Edit')?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link logout"
                                           href="<?= $url->createAbsoluteUrl(['logout']) ?>"><i
                                                    class="icofont align-middle">logout</i> <?=Yii::t('app','Logout')?></a></li>

                                </ul>۵
                            </div>
                            <h4 class="text-center mt-3"><a href="<?= Yii::$app->request->hostInfo ?>"
                                                            class="btn btn-warning btn-sm py-1 text-white">رفتن
                                    به صفحه اصلی سایت</a></h4>
                            <ul class="nav nav-mainmenu flex-column p-0 m-0 mt-3">


                                <li class="nav-item <?= Yii::$app->controller->action->id == 'user' ? 'open' : '' ?>">
                                    <a class="nav-link rounded <?= Yii::$app->controller->action->id == 'index' ? '' : '' ?>"
                                       href="<?= $url->createAbsoluteUrl(['user/index']) ?>">زیرمجموعه ها</a>
                                </li>
                                <li class="nav-item <?= Yii::$app->controller->action->id == 'index' ? 'open' : '' ?>">
                                    <a class="nav-link rounded <?= Yii::$app->controller->action->id == 'index' ? '' : '' ?>"
                                       href="<?= $url->createAbsoluteUrl(['user/create']) ?>">ثبت زیرمجموعه جدید</a>
                                </li>





                            </ul>
<!--                            <ul class="nav nav-mainmenu flex-column p-0 m-0 mt-3">-->
<!---->
<!---->
<!--                                <li class="nav-item --><?//= Yii::$app->controller->action->id == 'index' ? 'open' : '' ?><!--">-->
<!--                                    <a class="nav-link rounded --><?//= Yii::$app->controller->action->id == 'index' ? '' : '' ?><!--"-->
<!--                                       href="--><?//= $url->createAbsoluteUrl(['blog/categories/index']) ?><!--">دسته بندی‌ها</a>-->
<!--                                </li>-->
<!--                                <li class="nav-item --><?//= Yii::$app->controller->action->id == 'index' ? 'open' : '' ?><!--">-->
<!--                                    <a class="nav-link rounded --><?//= Yii::$app->controller->action->id == 'index' ? '' : '' ?><!--"-->
<!--                                       href="--><?//= $url->createAbsoluteUrl(['blog/company/index']) ?><!--">شرکت های بیمه</a>-->
<!--                                </li>-->
<!--                                <li class="nav-item --><?//= Yii::$app->controller->action->id == 'index' ? 'open' : '' ?><!--">-->
<!--                                    <a class="nav-link rounded --><?//= Yii::$app->controller->action->id == 'index' ? '' : '' ?><!--"-->
<!--                                       href="--><?//= $url->createAbsoluteUrl(['blog/articles/index']) ?><!--">مقالات</a>-->
<!--                                </li>-->
<!--                                <li class="nav-item --><?//= Yii::$app->controller->action->id == 'index' ? 'open' : '' ?><!--">-->
<!--                                    <a class="nav-link rounded --><?//= Yii::$app->controller->action->id == 'index' ? '' : '' ?><!--"-->
<!--                                       href="--><?//= $url->createAbsoluteUrl(['blog/insurance_type/index']) ?><!--">اتواع بیمه</a>-->
<!--                                </li>-->
<!---->
<!--                              -->
<!---->
<!--                               -->
<!--                            </ul>-->
                            <div class="sidebar-footer text-center">
                                <div class="d-inline-block bg-light text-muted small rounded px-2"><span
                                            class="fanum"></span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-8 col-lg-9 col-xl-10" id="page-content-area">
            <div id="page-content" class="px-sm-3">
                <div class="card p-3 mr-5">
                    <?= $content ?>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="bg-light copyright mr-3">
            <div class="row align-items-center mr-5">
                <div class="d-none d-lg-block col-4 col-lg-3 col-xl-2"></div>
                <div class="col">
                    <div class="text-muted">تمامی حقوق پلتفرم <b>بیمه‌بها</b> برای شرکت <b class="text-info">تمیم
                            فناوران‌ نورسا</b> میباشد محفوظ
                        است. هر گونه کپی برداری یا استفاده از متد های پلتفرم <b>بیمه‌بها</b> با پیگرد قانونی همراه خواهد
                        بود.
                    </div>
                </div>
            </div>
        </div>
        <?php
$pagination = <<< JS

$('ul.pagination > li').addClass('page-item');
$('ul.pagination > li > a').addClass('page-link');
$('ul.pagination > li > span').addClass('page-link')
$('ul.pagination').css('direction','ltr')
$('ul.pagination').addClass('float-right')
JS;

$this->registerJs($pagination,\yii\web\View::POS_END);
?>
        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


