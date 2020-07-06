<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\OauthAsset;
use yii\helpers\Html;

OauthAsset::register($this);
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
    <link rel="icon" type="image/x-icon" href="favicon.ico" />  <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php echo $this->head(); ?>
</head>

<body class="bg-dark authentication">
<?php $this->beginBody() ?>

    <?=$content?>
<?php $this->endBody() ?>
<style>
    .help-block{
        color: red;
    }
</style>
</body>
</html>
<?php $this->endPage() ?>


