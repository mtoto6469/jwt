<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'ثبت نام';
$url = Yii::$app->urlManager;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="container">
        <div class="content-center">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-8">
                    
                    <div class="intro py-md-4 px-md-4">

                                            <h1 class="my-4 text-center text-sm-right">
                                                <?=Yii::t('app','HeaderDescriptionOauth')?>
                                            </h1>
                                            <p><?=Yii::t('app','DescriptionOauth')?> </p>
                        <div class="intro-footer mt-2 mt-md-4">
                            <ul class="social-list text-center mb-3 mb-md-0 text-md-right">
                                <li><a href="https://www.facebook.com/bimebaha" target="_blank"><i
                                                class="icofont icofont-lg">facebook</i></a>
                                </li>
                                <li><a href="https://twitter.com/bimebaha" target="_blank"><i class="icofont icofont-lg">twitter</i></a>
                                </li>
                                <li><a href="https://plus.google.com/" target="_blank"><i class="icofont icofont-lg">google_plus</i></a>
                                </li>
                                <li><a href="https://t.me/bimebaha" target="_blank"><i
                                                class="icofont icofont-lg">telegram</i></a>
                                </li>
                                <li><a href="https://www.instagram.com/bimebaha" target="_blank"><i
                                                class="icofont icofont-lg">instagram</i></a></li>
                            </ul>
                            <hr>
                            <ul class="nav mx-0 px-0">
                                <li class="nav-item">
                                    <a class="nav-link text-light active" href="<?= $url->baseUrl ?>/about-us"><?=Yii::t('app','About-us')?>
                                        </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="<?= $url->baseUrl ?>/contact-us"><?=Yii::t('app','Contact-us')?>
                                        </a>
                                </li>
                                <li class="nav-item">
                                                                    <a class="nav-link text-light" href="<?=Yii::$app->homeUrl?>"><?=Yii::t('app','ReturnToSite')?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center mb-5"><?=Yii::t('app','HeaderPageSignup')?></h1>

                            <div class="my-4">
                                <?= $form->field($model, 'username')->textInput(['placeholder' => Yii::t('app', 'EnterUsername')])->label(false) ?>
                                <?= $form->field($model, 'phone')->textInput(['placeholder' => Yii::t('app', 'EnterPhone')])->label(false) ?>
                                <?= $form->field($model, 'email')->textInput(['placeholder' => Yii::t('app', 'EnterEmail')])->label(false) ?>
                                <?= $form->field($model, 'user_parent')->textInput(['placeholder' => Yii::t('app', 'EnterCodeUserParent')])->label(false) ?>

                                <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'EnterPassword')])->label(false) ?>
                                <p class="help-block help-block-error"><?=Yii::$app->session->getFlash('error_access')?></p>
                            </div>
                            <div class="text-center my-2">
                                <?= Html::submitButton(Yii::t('app', 'ButtonSignup'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>

                            <div class="text-center my-2">
                                <a href="<?=Yii::$app->urlManager->createAbsoluteUrl('site/login')?>" class="btn btn-outline-secondary btn-block"><?=Yii::t('app', 'ButtonRedirectLogin')?></a>
                            </div>
                            <div class="text-center mt-4">
                                <?= Html::a(Yii::t('app','ButtonForgetPassword'), ['forget_password'], ['class' => 'text-warning']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<?php
$ui_js = <<<JS
    $(document).ready(function() {
      $('<i class="icofont">user_male</i>').insertAfter('#user_-form-username');
      $('<i class="icofont">ui_email</i>').insertAfter('#user_-form-email');
      $('<i class="icofont">smart_phone</i>').insertAfter('#user_-form-phone');
      $('<i class="icofont">ui_lock</i>').insertAfter('#user_-form-password');
      $('<i class="icofont">user_male</i>').insertAfter('#user_-form-user_parent');
      $('.form-control').addClass('fanum ltr');
      $('.form-group').addClass('form-group-icon');
    })
JS;

$this->registerJs($ui_js, \yii\web\View::POS_END);
