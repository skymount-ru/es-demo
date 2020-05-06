<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "actor_info".
 *
 * @property int|null $actor_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $film_info
 */
class ActorInfo extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actor_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['actor_id'], 'default', 'value' => null],
            [['actor_id'], 'integer'],
            [['film_info'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'actor_id' => 'Actor ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'film_info' => 'Film Info',
        ];
    }
}
