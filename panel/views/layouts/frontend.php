<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;

\app\assets\FrontendAsset::register($this);
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
    .font-smol ul li a{
        font-size: 11px!important;
        padding-right: 10px!important;
        padding-left: 10px!important;
    }
    .nav-item ul{
        padding-right: 0;
    }
    .navbar .dropdown-menu{
        min-width: 12rem!important;
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

<header class="header-transparent font-smol" id="header-main" style="font-size: 12px!important;">
    <nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-dark font-smol" id="navbar-main">
        <div class="container"><a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><img alt="سهم آرمانی"
                                                                                             src="../../assets/img/brand/light-mono.svg"
                                                                                             id="navbar-logo"> </a>
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
                <ul class="navbar-nav align-items-lg-center d-none d-lg-flex ml-lg-auto">


                    <li class="nav-item"><a class="nav-link"
                                            href="<?= Yii::$app->urlManager->createAbsoluteUrl(['services']) ?>">خدمات</a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?= Yii::$app->urlManager->createAbsoluteUrl(['twiter']) ?>">تویتر
                            آرمانی</a></li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?= Yii::$app->urlManager->createAbsoluteUrl(['articles']) ?>">مقالات</a>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?= Yii::$app->urlManager->createAbsoluteUrl(['contact-us']) ?>">تماس
                            باما</a></li>
                    <li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                                      href="#">خبرهای صندوق</a>
                        <div class="dropdown-menu text-right">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['NewsList']) ?>">لیست خبرها</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                            href="#">ارکان صندوق</a>
                        <div class="dropdown-menu text-right">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['Auditor']) ?>">حسابرس صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['Guarantee']) ?>">ضامن صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['InvestmentManager']) ?>">مدیر سرمایه‌گذاری</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['Manager']) ?>">مدیر صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['Trustee']) ?>">متولی صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundBroker']) ?>">کارگزار صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundRegistrationManager']) ?>">مدیر ثبت</a></li>
                            </ul>
                        </div>
                    </li> <li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                            href="#">گزارش های صندوق</a>
                        <div class="dropdown-menu text-right">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['SuperUnits']) ?>"> دارندگان واحدهای ممتاز</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FinancialStatements']) ?>">صورت‌های مالی صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['EfficiencyForDifferentPeriods']) ?>">مجامع صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['DailyEfficiency']) ?>">بازده دوره ای صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['AssetDistributionForDifferentPeriods']) ?>">بازده روزانه صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['DailyAssetDistributionp']) ?>">ترکیب داراییهای دوره ای</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['DailyAssetDistribution']) ?>">ترکیب داراییهای روزانه</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown" ><a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                            href="#">درباره
                            صندوق</a>
                        <div class="dropdown-menu text-right">
                            <ul class="nav flex-column ">
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundCost']) ?>">اهداف صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundGoals']) ?>">اساسنامه صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundProspectus']) ?>">امیدنامه صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundBankAccounts']) ?>">حساب‌های بانکی صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundInvestmentHelp']) ?>">راهنمای سرمایه‌گذاری</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundBranchs']) ?>">شعبه‌های صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundGeneralInfo']) ?>">اطلاعات کلی صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundContactUs']) ?>">ارتباط با صندوق</a></li>
                                <li class="nav-item"><a class="dropdown-item " href="<?= Yii::$app->urlManager->createAbsoluteUrl(['FundComplaint']) ?>">ثبت شکایت</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?= Yii::$app->urlManager->createAbsoluteUrl(['login']) ?>">ورود | ثبت
                            نام</a></li>


                </ul>
                <div class="d-lg-none px-4 text-center mt-2"><a class="btn btn-block btn-sm btn-primary"
                                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['services']) ?>">خدمات</a>
                </div>
                <div class="d-lg-none px-4 text-center mt-2"><a class="btn btn-block btn-sm btn-primary"
                                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['twiter']) ?>">تویتر
                        آرمانی</a></div>
                <div class="d-lg-none px-4 text-center mt-2"><a class="btn btn-block btn-sm btn-primary"
                                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['articles']) ?>">مقالات</a>
                </div>
                <div class="d-lg-none px-4 text-center mt-2"><a class="btn btn-block btn-sm btn-primary"
                                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['contact-us']) ?>">تماس
                        باما</a></div>
                <div class="d-lg-none px-4 text-center mt-2"><a class="btn btn-block btn-sm btn-primary"
                                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['about-us']) ?>">درباره
                        ما</a></div>
                <div class="d-lg-none px-4 text-center mt-2"><a class="btn btn-block btn-sm btn-primary"
                                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['login']) ?>">ورود
                        | ثبت نام</a></div>
            </div>
        </div>
    </nav>
</header>
<?= $content ?>
<footer class="position-relative text-right" id="footer-main">
    <div class="footer pt-lg-7 footer-dark bg-dark">
        <div class="shape-container shape-line shape-position-top shape-orientation-inverse">
            <svg width="2560px" height="100px" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" x="0px" y="0px"
                 viewBox="0 0 2560 100" style="enable-background:new 0 0 2560 100" xml:space="preserve" class=""><polygon
                        points="2560 0 2560 100 0 100"></polygon></svg>
        </div>
        <div class="container pt-4">
            <hr class="divider divider-fade divider-dark my-5">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0"><a href="../../index.html"><img alt="سهم آرمانی"
                                                                                   src=""
                                                                                   id="footer-logo"></a>
                    <p class="mt-4 text-sm opacity-8 pr-lg-4">
                        شرکت سبدگردان آرمان اقتصاد با اخذ تمامی مجوزهای رسمی فعالیت از
                        سازمان بورس و اوراق بهادار، تلاش می­ کند تا اعتماد حداکثری شما سرمایه‌گذاران ارجمند را

                    </p>

                </div>

                <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0"><h6 class="heading mb-3"></h6>
                    <ul class="list-unstyled">
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['services']) ?>">خدمات</a>
                        </li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['twiter']) ?>">تویتر
                                آرمانی</a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['articles']) ?>">مقالات</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0"><h6 class="heading mb-3"></h6>
                    <ul class="list-unstyled">

                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['contact-us']) ?>">تماس
                                باما</a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['about-us']) ?>">درباره
                                ما</a></li>
                        <li class="nav-item"><a class="nav-link"
                                                href="<?= Yii::$app->urlManager->createAbsoluteUrl(['login']) ?>">ورود | ثبت
                                نام</a></li>
                    </ul>
                </div>
            </div>
            <hr class="divider divider-fade divider-dark my-4">
            <div class="row align-items-center justify-content-md-between pb-4">

            </div>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>

</body>
<!---begin GOFTINO code--->
<!--<script type="text/javascript">-->
<!--    !function () {-->
<!--        var g = document.createElement("script"), s = "https://www.goftino.com/widget/fCzCa3",-->
<!--            e = document.getElementsByTagName("script")[0];-->
<!--        g.type = "text/javascript";-->
<!--        g.async = !0;-->
<!--        g.src = localStorage.getItem("goftino") ? s + "?o=" + localStorage.getItem("goftino") : s;-->
<!--        e.parentNode.insertBefore(g, e);-->
<!--    }();-->
<!--    var mySwiper = new Swiper('.swiper-container', {-->
<!--        speed: 400,-->
<!--        spaceBetween: 100-->
<!--    });-->
<!--</script>-->

<!---end GOFTINO code--->
</html>
<?php $this->endPage() ?>
