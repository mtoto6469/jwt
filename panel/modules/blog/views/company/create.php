<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\blog\models\InsuranceCo */

$this->title = Yii::t('app', 'Create Insurance Co');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Insurance Cos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="insurance-co-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
