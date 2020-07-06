<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\InsuranceLabel */

$this->title = Yii::t('app', 'Create Insurance Label');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Insurance Labels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-label-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
