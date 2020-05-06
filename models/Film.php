<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "film".
 *
 * @property int $film_id
 * @property string $title
 * @property string|null $description
 * @property int|null $release_year
 * @property int $language_id
 * @property int $rental_duration
 * @property float $rental_rate
 * @property int|null $length
 * @property float $replacement_cost
 * @property string|null $rating
 * @property string $last_update
 * @property string|null $special_features
 * @property string $fulltext
 *
 * @property Language $language
 * @property FilmActor[] $filmActors
 * @property Actor[] $actors
 * @property FilmCategory[] $filmCategories
 * @property Category[] $categories
 * @property Inventory[] $inventories
 */
class Film extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'language_id', 'fulltext'], 'required'],
            [['description', 'rating', 'special_features', 'fulltext'], 'string'],
            [['release_year', 'language_id', 'rental_duration', 'length'], 'default', 'value' => null],
            [['release_year', 'language_id', 'rental_duration', 'length'], 'integer'],
            [['rental_rate', 'replacement_cost'], 'number'],
            [['last_update'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'language_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'film_id' => 'Film ID',
            'title' => 'Title',
            'description' => 'Description',
            'release_year' => 'Release Year',
            'language_id' => 'Language ID',
            'rental_duration' => 'Rental Duration',
            'rental_rate' => 'Rental Rate',
            'length' => 'Length',
            'replacement_cost' => 'Replacement Cost',
            'rating' => 'Rating',
            'last_update' => 'Last Update',
            'special_features' => 'Special Features',
            'fulltext' => 'Fulltext',
        ];
    }

    /**
     * Gets query for [[Language]].
     *
     * @return ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['language_id' => 'language_id']);
    }

    /**
     * Gets query for [[FilmActors]].
     *
     * @return ActiveQuery
     */
    public function getFilmActors()
    {
        return $this->hasMany(FilmActor::className(), ['film_id' => 'film_id']);
    }

    /**
     * Gets query for [[Actors]].
     *
     * @return ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::className(), ['actor_id' => 'actor_id'])->viaTable('film_actor', ['film_id' => 'film_id']);
    }

    /**
     * Gets query for [[FilmCategories]].
     *
     * @return ActiveQuery
     */
    public function getFilmCategories()
    {
        return $this->hasMany(FilmCategory::className(), ['film_id' => 'film_id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['category_id' => 'category_id'])->viaTable('film_category', ['film_id' => 'film_id']);
    }

    /**
     * Gets query for [[Inventories]].
     *
     * @return ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(Inventory::className(), ['film_id' => 'film_id']);
    }
}
