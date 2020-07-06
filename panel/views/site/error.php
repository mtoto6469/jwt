<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
$url = Yii::$app->urlManager;

?>

<div class="site-error text-center mt-5 text-white">

    <h1 class="text-white h1 mb-2">سهم آرمانی</h1>
    <?php
    switch (Yii::$app->response->statusCode)
    {
        case 404:{
            $this->title = 'صفحه ای پیدا نشده';
            echo '<h1 style="font-size: 100px">۴۰۴</h1>';
            break;
        }
        case 403:{
            $this->title = 'شما به این قسمت دسترسی ندارید';
            echo '<h1 style="font-size: 100px">۴۰۳</h1>';
            break;
        }
        case 400:{
            $this->title = 'درخواست شما درست نمیباشد';
            echo '<h1 style="font-size: 100px">۴۰۰</h1>';
            break;
        }

    }
    echo '<h1>'.$this->title.'</h1>';

    ?>


    <h3>
        خطا در بالا رخ داده است در حالی که وب سرور پردازش درخواست شما بود.    </h3>
    <h3>
        اگر فکر می کنید این یک خطای سرور است، لطفا با ما تماس بگیرید. متشکرم.
    </h3>




</div>
