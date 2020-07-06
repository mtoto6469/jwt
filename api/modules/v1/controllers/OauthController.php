<?php

namespace api\modules\v1\controllers;

use api\modules\v1\models\MessagesSms;
use api\modules\v1\models\UserSignup;
use api\modules\v1\models\LoginForm;
use api\modules\v1\models\User;
use yii\rest\Controller;

class OauthController extends Controller
{



    /**
     * @SWG\Get(path="/oauth/send-verify-code",
     *     tags={"oauth"},
     *     summary="get phon number validat it and send code",
     *     description="گرفتن شماره تلفن و اعتبارسنجی کردن آن و بعد از معتبر بودن کد ارسال میشود",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "phone",
     *        description = "گرفتن شماره تلفن",
     *        required=true,
     *        type = "integer"
     *     ),
     *
     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
                            public => 'کد فعال سازی برای شماره همراه ارسال شد.'"
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     *     @SWG\Response(
     *     response = 500,
     *     description="private => null,
                        public => خطا در ارسال پیام تایید.دوباره تلاش کنید.",
     *
     *     )
     * )
     *
     */
    public function actionSendVerifyCode($phone)
    {
        VerifyPhone::deleteAll(['phone' => $phone]);
        $model = new VerifyPhone();
        $model->phone = $phone;
        $model->verify_code = rand(10000, 99999);

        if ($model->validate() && $model->save()) {
            try {
                $api = \yii::$app->Kavenegar->KavenegarApi();
                $receptor = $model->phone;
                $result = $api->VerifyLookup($receptor, $model->verify_code, '', '', 'verify');
                if ($result) {
                    $r = $result[0];
                    $message = new LogSms();
                    $message->message_id = (string)$r->messageid;
                    $message->message = $r->message;
                    $message->status = $r->status;
                    $message->status_text = $r->statustext;
                    $message->sender = $r->sender;
                    $message->receptor = $r->receptor;
                    $message->date = $r->date;
                    $message->cost = (string)$r->cost;
                    if ($message->save()) {
                        return [
                            'status' => 'DONE',
                            'message' => [
                                'private' => null,
                                'public' => 'کد فعال سازی برای شماره همراه' . $phone . ' ارسال شد.',
                            ],
                            'data' => []
                        ];
                    } else {
                        return [
                            'status' => 'FAILED',
                            'message' => [
                                'private' => $message->errors,
                                'public' => 'کد فعال سازی برای شماره همراه' . $phone . ' ارسال نشد.',
                            ],
                            'data' => []
                        ];
                    }
                }
            } catch (\Kavenegar\Exceptions\ApiException $e) {

                \Yii::$app->session->setFlash('errors', $e->errorMessage());
                return [
                    'status' => 'FAILED',
                    'message' => [
                        'private' => null,
                        'public' => 'خطا در ارسال پیام تایید.دوباره تلاش کنید.',
                    ],
                    'data' => []
                ];

            } catch (\Kavenegar\Exceptions\HttpException $e) {
                \Yii::$app->session->setFlash('errors', $e->errorMessage());
                return [
                    'status' => 'FAILED',
                    'message' => [
                        'private' => null,
                        'public' => 'خطا در ارسال پیام تایید.دوباره تلاش کنید.',
                    ],
                    'data' => []
                ];
            }
        } else {
            return [
                'status' => 'FAILED',
                'message' => [
                    'private' => $model->errors,
                    'public' => '',
                ],
                'data' => []
            ];
        }
    }

    /**
     * @SWG\Get(path="/oauth/verify-phone",
     *     tags={"oauth"},
     *     summary="get phon number and verify code and send token",
     *     description="گرفتن شماره تلفن و کد ارسال شده، بعد از اعتبار سنجی آنها ارسال توکن",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "verifyCode",
     *        description = " کد",
     *        required=true,
     *        type = "integer"
     *     ),
     *      @SWG\Parameter(
     *        in = "query",
     *        name = "phone",
     *        description = " شماره تلفن",
     *        required=true,
     *        type = "integer"
     *     ),
     *
     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
                            public => 'کد فعال سازی برای شماره همراه ارسال شد.'"
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     *     @SWG\Response(
     *     response = 500,
     *     description="private => null,
                        public => خطا در ارسال پیام تایید.دوباره تلاش کنید.",
     *
     *     )
     * )
     *
     */
    public function actionVerifyPhone($phone, $verifyCode)
    {
        $validate = new VerifyPhone();
        $validate->phone = $phone;
        $validate->verify_code = $verifyCode;
        if ($validate->validate()) {
            $model = VerifyPhone::find()->where(['phone' => $phone])->andWhere(['verify_code' => $verifyCode])->one();
            if (isset($model)) {
                $user = User::findByUsername($phone);
                if (isset($user)) {
                    $model->delete();
                    return [
                        'status' => 'DONE',
                        'message' => [
                            'private' => null,
                            'public' => 'اعتبار سنجی با موفقیت انجام شد.',
                        ],
                        'data' => [
                            'accessToken' => $user->accessToken
                        ]
                    ];
                } else {
                    $user = new User();
                    $user->username = $phone;
                    $user->authKey = \Yii::$app->security->generateRandomString();
                    $user->accessToken = \Yii::$app->security->generateRandomString();
                    if ($user->save()) {
                        return [
                            'status' => 'DONE',
                            'message' => [
                                'private' => null,
                                'public' => 'اعتبار سنجی با موفقیت انجام شد.',
                            ],
                            'data' => [
                                'accessToken' => $user->accessToken
                            ]
                        ];
                    } else {
                        return [
                            'status' => 'DONE',
                            'message' => [
                                'private' => $user->errors,
                                'public' => 'اعتبار سنجی با موفقیت انجام نشد.',
                            ],
                            'data' => [
                                'accessToken' => []
                            ]
                        ];
                    }
                }
            } else {
                return [
                    'status' => 'FAILED',
                    'message' => [
                        'private' => null,
                        'public' => 'این شماره همراه(' . $validate->phone . ') برای اعتبار سنجی ثبت نشده است دوباره تلاش کنید',
                    ],
                    'data' => []
                ];
            }
        } else {
            return [
                'status' => 'FAILED',
                'message' => [
                    'private' => $validate->errors,
                    'public' => '',
                ],
                'data' => []
            ];
        }
    }


    /**
     * @SWG\Get(path="/oauth/get-jobs-title",
     *     tags={"oauth"},
     *     summary="set cuontry id ,provider id and get city name",
     *     description="دریافت شغل ها",
     *     produces={"application/json"},

     *     @SWG\Response(
     *         response = 200,
     *         description ="private => null,
    public => ''",
     *
     *     ),
     *      @SWG\Schema(
     *             type="object",
     *             @SWG\Property(
     *                  property="stations",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Location")
     *             ),
     *         ),
     * )
     *
     */
    public function actionGetJobsTitle()
    {


        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('get')
            ->setUrl('https://apibeta.finnotech.ir/bourse/v2/clients/armaneghtesad1/jobs?trackId=' . $this->gen_uuid())
            ->setHeaders(['Authorization' => 'Bearer ' . $this->key])
            ->send();
        $result = json_decode($response->content);

        return [
            'status' => 'DONE',
            'message' => [
                'private' => null,
                'public' => '',
            ],
            'data' => isset($result->result) ? $result->result : []
        ];

    }

}
