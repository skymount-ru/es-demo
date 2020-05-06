<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "film_category".
 *
 * @property int $film_id
 * @property int $category_id
 * @property string $last_update
 *
 * @property Category $category
 * @property Film $film
 */
class FilmCategory extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'category_id'], 'required'],
            [['film_id', 'category_id'], 'default', 'value' => null],
            [['film_id', 'category_id'], 'integer'],
            [['last_update'], 'safe'],
            [['film_id', 'category_id'], 'unique', 'targetAttribute' => ['film_id', 'category_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'film_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'category_id' => 'Category ID',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * Gets query for [[Film]].
     *
     * @return ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Film::className(), ['film_id' => 'film_id']);
    }
}
