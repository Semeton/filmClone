<?php

namespace app\models;

use Yii;
use \yii\helpers\Html;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $body
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 *
 * @property NewUser $createrBy
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    public function behaviors()
    {

        return [
                    TimestampBehavior::class,
                [
                    'class' => BlameableBehavior::class,
                    'updatedByAttribute' => false
                ],

                [
                    'class' => SluggableBehavior::class,
                    'attribute' => 'title'

                ]    
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['created_by'], 'integer'],
            [['title', 'body'], 'required'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['body'], 'string', 'max' => 10000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => NewUser::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'body' => 'Body',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(NewUser::className(), ['id' => 'created_by']);
        // return ['attribute'=>'new_user.username'];
    }

    public function getEncodedBody()
    {
        return Html::encode($this->body);
    }
}