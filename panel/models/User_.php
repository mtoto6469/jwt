<?php




namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $user_parent
 * @property string $username
 * @property string|null $full_name
 * @property string|null $phone
 * @property string|null $verify_code
 * @property string $auth_key
 * @property string $password
 * @property string|null $password_reset_token
 * @property string|null $email
 * @property string $unique_key
 * @property int|null $status
 * @property string $access_token
 * @property string $token_expiers
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class User_ extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password', 'unique_key', 'access_token'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['token_expiers'], 'safe'],
            [['user_parent', 'full_name'], 'string', 'max' => 100],
            [['username', 'password', 'password_reset_token', 'access_token'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11],
            [['verify_code'], 'string', 'max' => 4],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 200],
            [['unique_key'], 'string', 'max' => 16],
            [['unique_key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_parent' => Yii::t('app', 'User Parent'),
            'username' => Yii::t('app', 'Username'),
            'full_name' => Yii::t('app', 'Full Name'),
            'phone' => Yii::t('app', 'Phone'),
            'verify_code' => Yii::t('app', 'Verify Code'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'unique_key' => Yii::t('app', 'Unique Key'),
            'status' => Yii::t('app', 'Status'),
            'access_token' => Yii::t('app', 'Access Token'),
            'token_expiers' => Yii::t('app', 'Token Expiers'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

}