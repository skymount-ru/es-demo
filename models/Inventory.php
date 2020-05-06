<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "inventory".
 *
 * @property int $inventory_id
 * @property int $film_id
 * @property int $store_id
 * @property string $last_update
 *
 * @property Film $film
 * @property Rental[] $rentals
 */
class Inventory extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['film_id', 'store_id'], 'required'],
            [['film_id', 'store_id'], 'default', 'value' => null],
            [['film_id', 'store_id'], 'integer'],
            [['last_update'], 'safe'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'film_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'inventory_id' => 'Inventory ID',
            'film_id' => 'Film ID',
            'store_id' => 'Store ID',
            'last_update' => 'Last Update',
        ];
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

    /**
     * Gets query for [[Rentals]].
     *
     * @return ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['inventory_id' => 'inventory_id']);
    }
}
