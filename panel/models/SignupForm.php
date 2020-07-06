<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Signup form
 */
class SignupForm extends ActiveRecord
{
    public $username;
    public $email;
    public $password;
    public $phone;
    public $unique_key;
    public $auth_key;

    public static function tableName(){
        return '{{%user}}';
    }

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
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 1],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This phone has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {

        $this->unique_key = uniqid();
        $this->username = $this->username;
        $this->email = $this->email;
        $this->setPassword($this->password);
        $this->generateAuthKey();
        return $this->save() ;

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
