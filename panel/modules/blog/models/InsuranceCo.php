<?php

namespace app\modules\blog\models;

use Yii;

/**
 * This is the model class for table "insurance_co".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string $title
 * @property string $keys
 * @property int $created_at
 * @property int $updated_at
 */
class InsuranceCo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insurance_co';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'slug', 'title', 'keys', 'created_at', 'updated_at'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'title', 'keys'], 'string', 'max' => 200],
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
            'description' => Yii::t('app', 'Description'),
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'keys' => Yii::t('app', 'Keys'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
