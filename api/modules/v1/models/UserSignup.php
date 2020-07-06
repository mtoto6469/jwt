<?php

namespace api\modules\v1\models;


use api\modules\v1\models\MessagesSms;
use yii\base\Model;

class UserSignup extends Model
{

    public $username;
    public $email;
    public $phone;
    public $verify_code;
    public $password;
    public $password_confirm;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],

            ['username', function ($model){
                if (isset($model->username)) {
                    if (!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $model->username) && !preg_match('/^(\0|0)?9\d{9}$/', $model->username)) {
                         $this->addError('username', 'نام کاربری نامعتبر میباشد');
                    }
                }
            }],


            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 200],

            ['phone', 'trim'],
            ['phone', 'string', 'max' => 11],


            ['password', 'string', 'min' => 6],
//            ['password', 'required'],
//            ['password_confirm', 'required'],
//            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => 'تکرار رمز ورود صحیح نمیباشد']

        ];
    }

    public function signup()
    {

        if (!$this->validate()) {
            \Yii::$app->response->statusCode = 400;
            return $this->errors;
        }


        $user = User::find()->where(['username' => $this->username])->one();




        if (isset($user)) {
            $user->access_token = \Yii::$app->security->generateRandomString();
            $user->verify_code = rand(1000, 9999);
            if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $user->username)) {

            } else {


                if ($user->save()) {
                    try {
                        $api = \yii::$app->Kavenegar->KavenegarApi();
                        $sender = "10004346";
                        $message = "Kaveh specialized Web service ";
                        $receptor = $user->phone;
                        $result = $api->VerifyLookup($receptor, $user->verify_code, '', '', 'verify');
                        ;
                        if ($result) {
                            $r = $result[0];
                            $message = new MessagesSms();
                            $message->messageid = (string)$r->messageid;
                            $message->message = $r->message;
                            $message->status = $r->status;
                            $message->statustext = $r->statustext;
                            $message->sender = $r->sender;
                            $message->receptor = $r->receptor;
                            $message->date = $r->date;
                            $message->cost = (string)$r->cost;
                             $message->save();

                        }
                    } catch (\Kavenegar\Exceptions\ApiException $e) {

                        $e->errorMessage();
                    } catch (\Kavenegar\Exceptions\HttpException $e) {

                        $e->errorMessage();
                    }
                    return [
                        'message'=>['گد تایید به شماره شما ارسال شد'],
                    ];
                } else {
                    return $this->errors;
                }
            }
        } else {
            $user = new User();

            $user->username = $this->username;

            $user->access_token = \Yii::$app->security->generateRandomString();
            $user->unique_key = time() . \mt_rand(10, 99);
            $user->verify_code = rand(1000, 9999);
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $user->username)) {
                $user->email = $this->username;
                $this->email = $this->username;
                if($this->validate() && $user->save()){
                     $send = \Yii::$app->mailer->compose()
                        ->setFrom('job@sellegram.com')
                        ->setTo($user->email)
                        ->setSubject('کد تایید سلگرام')
                        ->setHtmlBody('کد تایید شما در سلگرام : <b>'.$user->verify_code.'</b>')
                        ->send();
                     if($send){
                         return [
                             'message'=>['گد تایید به شماره شما ارسال شد'],
                         ];
                     }
                    return [
                        'message'=>['گد تایید به شماره شما ارسال نشد'],
                    ];
                }

            } else {
                $user->phone = $this->username;
                $this->phone = $this->username;
                if ($this->validate() && $user->save()) {
                    try {
                        $api = \yii::$app->Kavenegar->KavenegarApi();
                        $sender = "10004346";
                        $message = "Kaveh specialized Web service ";
                        $receptor = $user->phone;
                        $result = $api->VerifyLookup($receptor, $user->verify_code, '', '', 'verify');
                        if ($result) {
                            $r = $result[0];
                            $message = new MessagesSms();
                            $message->messageid = (string)$r->messageid;
                            $message->message = $r->message;
                            $message->status = $r->status;
                            $message->statustext = $r->statustext;
                            $message->sender = $r->sender;
                            $message->receptor = $r->receptor;
                            $message->date = $r->date;
                            $message->cost = (string)$r->cost;

                            $message->save();

                        }
                    } catch (\Kavenegar\Exceptions\ApiException $e) {
                        $e->errorMessage();
                    } catch (\Kavenegar\Exceptions\HttpException $e) {
                        $e->errorMessage();
                    }
                    return [
                        'message'=>['گد تایید به شماره شما ارسال شد'],
                    ];
                } else {
                    return $this->errors;
                }
            }
        }


    }




    public function attributeLabels()
    {
        return [
            'username' => 'نام‌کاربری',
            'email' => 'ایمیل',
            'phone' => 'شماره‌همراه',
            'password' => 'رمزورود',
            'password_confirm' => 'تکرار رمزورود'
        ];
    }


}
