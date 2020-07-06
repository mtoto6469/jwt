<?php

namespace app\modules\blog\models;

use app\models\User;
use phpDocumentor\Reflection\File;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int $category_id
 * @property int $writer_id
 * @property int $count_view
 * @property int $like_view
 * @property string $title
 * @property string $body
 * @property string $description
 * @property string $keys
 * @property string $slug
 * @property string $cover
 * @property File $file
 *
 * @property int $created_at
 * @property int $updated_at
 */
class Articles extends \yii\db\ActiveRecord
{
    public $file;
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'writer_id', 'count_view', 'like_view', 'created_at', 'updated_at'], 'integer'],
            [['title', 'body', 'description', 'keys'], 'required'],
            [['body', 'description'], 'string'],
            [['title', 'keys', 'slug'], 'string', 'max' => 200],
            [['file'],'file','extensions'=>'jpg,png']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'writer_id' => Yii::t('app', 'Writer ID'),
            'count_view' => Yii::t('app', 'Count View'),
            'like_view' => Yii::t('app', 'Like View'),
            'title' => Yii::t('app', 'Title'),
            'body' => Yii::t('app', 'Body'),
            'description' => Yii::t('app', 'Description'),
            'keys' => Yii::t('app', 'Keys'),
            'slug' => Yii::t('app', 'Slug'),
            'cover' => Yii::t('app', 'Cover'),
            'file' => Yii::t('app', 'File Image'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getWriter()
    {
        return $this->hasOne(User::class,['id'=>'writer_id']);
    }
    public function getCategory()
    {
        return $this->hasOne(Categories::class,['id'=>'category_id']);
    }
}
