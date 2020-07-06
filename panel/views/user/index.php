<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\User_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_parent',
            'username',
            [
                    'attribute'=>'full_name',
                'value'=>function($model){
                    $profile = \app\models\Profile::find()->where(['user_id'=>$model->id])->one();
                    if(isset($profile)){
                        return $profile->full_name;
                    }
                    return  '------';
                }
            ],
            'phone',
            //'verify_code',
            //'auth_key',
            //'password',
            //'password_reset_token',
            //'email:email',
            //'unique_key',
            //'status',
            //'access_token',
            //'token_expiers',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
