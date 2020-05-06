<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "language".
 *
 * @property int $language_id
 * @property string $name
 * @property string $last_update
 *
 * @property Film[] $films
 */
class Language extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['last_update'], 'safe'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'language_id' => 'Language ID',
            'name' => 'Name',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * Gets query for [[Films]].
     *
     * @return ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasMany(Film::className(), ['language_id' => 'language_id']);
    }
}
