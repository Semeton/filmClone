<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $user_id
 * @property int $movie_id
 * @property string $card_name
 * @property string $card_number
 * @property string $month
 * @property string $year
 * @property string $cvv
 *
 * @property Movies $movie
 * @property NewUser $user
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'movie_id', 'card_name', 'card_number', 'month', 'year', 'cvv'], 'required'],
            [['user_id', 'movie_id'], 'integer'],
            [['card_name', 'card_number'], 'string', 'max' => 255],
            [['month', 'year', 'cvv'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewUser::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movies::className(), 'targetAttribute' => ['movie_id' => 'id']],
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
            'movie_id' => 'Movie ID',
            'card_name' => 'Card Name',
            'card_number' => 'Card Number',
            'month' => 'Month',
            'year' => 'Year',
            'cvv' => 'Cvv',
        ];
    }

    /**
     * Gets query for [[Movie]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movies::className(), ['id' => 'movie_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(NewUser::className(), ['id' => 'user_id']);
    }
}
