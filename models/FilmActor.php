<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "film_actor".
 *
 * @property int $actor_id
 * @property int $film_id
 * @property string $last_update
 *
 * @property Actor $actor
 * @property Film $film
 */
class FilmActor extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'film_actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actor_id', 'film_id'], 'required'],
            [['actor_id', 'film_id'], 'default', 'value' => null],
            [['actor_id', 'film_id'], 'integer'],
            [['last_update'], 'safe'],
            [['actor_id', 'film_id'], 'unique', 'targetAttribute' => ['actor_id', 'film_id']],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actor::className(), 'targetAttribute' => ['actor_id' => 'actor_id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => Film::className(), 'targetAttribute' => ['film_id' => 'film_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => 'Actor ID',
            'film_id' => 'Film ID',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * Gets query for [[Actor]].
     *
     * @return ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(Actor::className(), ['actor_id' => 'actor_id']);
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
