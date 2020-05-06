<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $name
 * @property string $last_update
 *
 * @property FilmCategory[] $filmCategories
 * @property Film[] $films
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'name' => 'Name',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * Gets query for [[FilmCategories]].
     *
     * @return ActiveQuery
     */
    public function getFilmCategories()
    {
        return $this->hasMany(FilmCategory::className(), ['category_id' => 'category_id']);
    }

    /**
     * Gets query for [[Films]].
     *
     * @return ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['film_id' => 'film_id'])->viaTable('film_category', ['category_id' => 'category_id']);
    }
}
