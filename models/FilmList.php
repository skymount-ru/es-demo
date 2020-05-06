<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "film_list".
 *
 * @property int|null $fid
 * @property string|null $title
 * @property string|null $description
 * @property string|null $category
 * @property float|null $price
 * @property int|null $length
 * @property string|null $rating
 * @property string|null $actors
 */
class FilmList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fid', 'length'], 'default', 'value' => null],
            [['fid', 'length'], 'integer'],
            [['description', 'rating', 'actors'], 'string'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['category'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fid' => 'Fid',
            'title' => 'Title',
            'description' => 'Description',
            'category' => 'Category',
            'price' => 'Price',
            'length' => 'Length',
            'rating' => 'Rating',
            'actors' => 'Actors',
        ];
    }
}
