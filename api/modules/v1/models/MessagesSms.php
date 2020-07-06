<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "messages_sms".
 *
 * @property string|null $messageid
 * @property string|null $message
 * @property int|null $status
 * @property string|null $statustext
 * @property string|null $sender
 * @property string|null $receptor
 * @property int|null $date
 * @property string|null $cost
 */
class MessagesSms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'messages_sms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'date'], 'integer'],
            [['messageid', 'statustext', 'sender', 'cost'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 250],
            [['receptor'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'messageid' => 'Messageid',
            'message' => 'Message',
            'status' => 'Status',
            'statustext' => 'Statustext',
            'sender' => 'Sender',
            'receptor' => 'Receptor',
            'date' => 'Date',
            'cost' => 'Cost',
        ];
    }
}
