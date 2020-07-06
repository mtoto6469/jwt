<?php
namespace api\modules\v1\controllers;

use api\modules\v1\models\UserSignup;
use api\modules\v1\models\User;
use yii\rest\Controller;
use yii\rest\ActiveController;
// use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
class TestController extends ActiveController{

  public $modelClass = User::class;

  public function behaviors(){
    $behaviors = parent::behaviors();
    $behaviors['authenticator'] = [

      'class'=>HttpBearerAuth::className(),

        // 'class' => HttpBasicAuth::className(),
        // 'auth'=>function($username,$password){
        // $user = User::findByUsername($username);
        // if($user && $user->validatePasswordBasic($password,$user->password)){
        //   return $user;
        // }
      // }
    ];

    return $behaviors;
  }


}
