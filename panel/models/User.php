<?php

namespace app\models;


use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    const ACTIVE_USER = 1;
    const INACTIVE_USER = 0;

    public function rules(){
        return[
            ['status','default','value'=>0],
            ['status','in','range'=>[self::ACTIVE_USER,self::INACTIVE_USER,2,3]]
        ];
    }

    public static function tableName(){
        return '{{%user}}';
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id,'status'=>[1,2,3]]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if($user = static::findOne(['access_token'=>$token,'status'=>[1,2,3]])){

            $expiers = strtotime('+1 day',strtotime($user->token_expiers));
            if($expiers > time()){
                $user->token_expiers = date('Y-m-d H:i:s', strtotime('now'));
                $user->save();

                return $user;
            }else{

                $user->access_token = '';
                $user->save();
            }
        }
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::find()->where(['username'=>$username])
            ->orWhere(['email'=>$username])
            ->andWhere(['status'=>[1,2,3]])
            ->one();
    }

    /**
     * Encrypt password
     *
     * @param $password
     * @throw \yii\base\Exeption;
     */

    public function setPassword($password){
        $this->password = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generate random string for authentication
     *
     */
    public function generateAuthKey(){
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        return \Yii::$app->security->validatePassword($password,$this->password);
    }

}
