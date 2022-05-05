<?php

namespace app\models;

use Yii;
use \yii\helpers\Html;

/**
 * This is the model class for table "movies".
 *
 * @property int $id
 * @property int $genre_id
 * @property string $movie_name
 * @property string $movie_description
 * @property string $movie_avatar
 * @property string $avatar_name
 * @property int $Price
 *
 * @property Genre $genre
 */
class Movies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genre_id', 'movie_name', 'movie_description', 'movie_avatar', 'avatar_name', 'Price'], 'required'],
            [['genre_id'], 'integer'],
            [['movie_name', 'movie_description', 'movie_avatar', 'avatar_name'], 'string', 'max' => 1024],
            [['Price'], 'number'],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_id' => 'Genre ID',
            'movie_name' => 'Movie Name',
            'movie_description' => 'Movie Description',
            'movie_avatar' => 'Movie Avatar',
            'Price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    
     public function getEncodedName(){
        return Html::encode($this->movie_name);
    }

    public function getEncodedDesp(){
        return Html::encode($this->movie_description);
    }
       
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }
}