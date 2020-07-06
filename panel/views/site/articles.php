<div class="container" style="margin-top: 200px !important;">
    <div class="row">

        <div class="row">
            <div class="col-md-4 col-sm-12">

                <div class="list-group mt-3">
                    <a href="#" class="list-group-item list-group-item-action active text-center text-white"
                       style="background-color: #294187 !important;font-size: 13px !important;">
                        سازمان ها و شرکت های مرتبط </a>
                    <?php
                    $insuranceTypes = \app\modules\blog\models\InsuranceType::find()->all();
                    foreach ($insuranceTypes as $insuranceType) {
                        ?>
                        <a href="<?= $insuranceType->link ?>" class="list-group-item list-group-item-action text-center"
                           style="font-size: 10px !important;"><?= $insuranceType->name ?></a>
                        <?php
                    }
                    ?>
                </div>
                <div class="list-group mt-3">
                    <a href="#" class="list-group-item list-group-item-action active text-center text-white"
                       style="background-color: #294187 !important;font-size: 13px !important;">
                        جدیدترین اخبار سهم آرمانی
                    </a>
                    <a href="#" class="list-group-item list-group-item-action text-center"
                       style="font-size: 10px !important;">بیمه شخص ثالث</a>
                    <a href="#" class="list-group-item list-group-item-action text-center"
                       style="font-size: 10px !important;">بیمه بدنه</a>
                    <a href="#" class="list-group-item list-group-item-action text-center"
                       style="font-size: 10px !important;">بیمه آتش سوزی و زلزله</a>
                    <a href="#" class="list-group-item list-group-item-action text-center"
                       style="font-size: 10px !important;">بیمه درمان تکمیلی</a>
                </div>
                <!--                <div class="list-group mt-3 mb-3">-->
                <!--                    <a href="#" class="list-group-item list-group-item-action active text-center text-white"-->
                <!--                       style="background-color: #294187 !important;font-size: 13px !important;">-->
                <!--                        برچسب ها-->
                <!--                    </a>-->
                <!--                    <a href="#" class="list-group-item list-group-item-action text-center"-->
                <!--                       style="font-size: 10px !important;">بیمه شخص ثالث</a>-->
                <!--                    <a href="#" class="list-group-item list-group-item-action text-center"-->
                <!--                       style="font-size: 10px !important;">بیمه بدنه</a>-->
                <!--                    <a href="#" class="list-group-item list-group-item-action text-center"-->
                <!--                       style="font-size: 10px !important;">بیمه آتش سوزی و زلزله</a>-->
                <!--                    <a href="#" class="list-group-item list-group-item-action text-center"-->
                <!--                       style="font-size: 10px !important;">بیمه درمان تکمیلی</a>-->
                <!--                </div>-->

            </div>
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-lg border-0" style="max-width: 100%">
                    <?php

                    foreach ($articles as $article) {
                        ?>

                        <div class="card-body px-5 py-5 text-right text-md-left">
                            <div class="row align-items-right">
                                <h2 class="h5">
                                    <?= $article->title ?>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                        <span class="text-xs">
                            <?php
                            //                                $created_at = Jdf::gregorian_to_jalali($article->created_at);
                            $date_at = explode('-', date("Y-m-d H:i:s", $article->created_at));
                            $time_at = explode(' ', $date_at[2]);
                            $created_at = \hoomanMirghasemi\jdf\Jdf::gregorian_to_jalali($date_at[0], $date_at[1], $time_at[0], '/') . ' ' . $time_at[1];
                            ?>
                            تاریخ انتشار : <?= $created_at ?>
                        </span>
                                </div>
                                <div class="col-auto">
                            <span class="text-xs">
                            در مورد : <?= $article->category->title ?>
                        </span>
                                </div>
                                <div class="col-auto">
                                <span class="text-xs">
                            نویسنده : <?= $article->writer->full_name ?>
                        </span>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-5 col-sm-12">
                                    <img width="100%"
                                         src="<?= Yii::getAlias('@web') . '/uploads/' . $article->cover ?>"
                                         class="rounded float-left" alt="...">
                                </div>
                                <div class="col-md-7 col-sm-12"
                                     style="text-align: justify !important;direction: rtl !important;">
                                    <p style="font-size: 14px !important;">
                                        <?= $article->description ?>
                                    </p>
                                    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['article/' . $article->id . '/' . str_replace(' ', '-', $article->title)]) ?>"
                                       class="btn btn-sm float-left btn-secondary"
                                       style="font-size: 13px !important;">بیشتر...</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }

                    ?>


                </div>

            </div>
        </div>


    </div>

