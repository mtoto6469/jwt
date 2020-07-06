<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $username
 * @property string|null $agent
 * @property string|null $ip
 * @property string|null $logtime
 * @property string|null $controller
 * @property string|null $action
 * @property string|null $input
 * @property string|null $outpot
 * @property string|null $method
 * @property string|null $route
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['input', 'outpot', 'method', 'route'], 'string'],
            [['user_id', 'username', 'agent', 'ip'], 'string', 'max' => 200],
            [['logtime', 'controller', 'action'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'agent' => 'Agent',
            'ip' => 'Ip',
            'logtime' => 'Logtime',
            'controller' => 'Controller',
            'action' => 'Action',
            'input' => 'Input',
            'outpot' => 'Outpot',
            'method' => 'Method',
            'route' => 'Route',
        ];
    }
}
