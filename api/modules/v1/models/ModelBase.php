<?php
namespace api\modules\v1\models;

use Yii;
use api\modules\v1\models\Logs;

class ModelBase extends \yii\db\ActiveRecord
{
	public function afterSave($insert, $changeAttributes) {
        
		// $log = new Logs();
		// $log->user_id = Yii::$app->user->id;
  //       $log->agent = Yii::$app->request->headers->get('user-agent');
  //       $log->host = Yii::$app->request->headers->get('host');
  //       $log->authorization = Yii::$app->request->headers->get('authorization');
  //       $log->controller = Yii::$app->controller->id;
  //       $log->action = Yii::$app->controller->action->id;
  //       $log->userIp = Yii::$app->request->userIp;
  //       $log->output = json_encode($this->attributes);
  //       $log->input = json_encode($this->attributes);
  //  	$logs->save();

		// var_dump(Yii::$app->controller->module->id);

//		$model = new Logs();
//		if($user = \Yii::$app->user){
//			$model->user_id = $user->id;
//			$model->user_id = $user->identity;
//		}
//
//		var_dump($mdoel);
//		exit;
	}
}