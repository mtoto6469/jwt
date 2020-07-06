<?php

use app\modules\blog\models\Categories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<div class="articles-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Categories::find()->all(),'id','title'),['prompt'=>'دسته را انتخاب کنید']) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'keys')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <script>
        CKEDITOR.config.language = 'fa';

        CKEDITOR.replace( 'Articles[body]' );
        CKEDITOR.replace( 'Articles[description]' );
    </script>
</div>
