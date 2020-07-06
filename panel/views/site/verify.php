
        <?php use yii\bootstrap\ActiveForm;
        use yii\bootstrap\Html;

        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="row">
                <div class="col-6">

                    <?= $form->field($model, 'full_name')->textInput(['placeholder' => Yii::t('app', 'Full Name')])->label(false) ?>

                    <?= $form->field($model, 'file_one')->fileInput()?>

                    <?= $form->field($model, 'file_tow')->fileInput()?>
                    <?= $form->field($model, 'file_tree')->fileInput()?>

                </div>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>


            </div>



        <?php ActiveForm::end(); ?>
