<?php

namespace app\modules\blog\models;

use Yii;

/**
 * This is the model class for table "insurance_type".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 */
class InsuranceType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insurance_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['name', 'link'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'link' => Yii::t('app', 'Link'),
        ];
    }
}
