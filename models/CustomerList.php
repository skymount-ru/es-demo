<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_list".
 *
 * @property int|null $id
 * @property string|null $name
 * @property string|null $address
 * @property string|null $zip code
 * @property string|null $phone
 * @property string|null $city
 * @property string|null $country
 * @property string|null $notes
 * @property int|null $sid
 */
class CustomerList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sid'], 'default', 'value' => null],
            [['id', 'sid'], 'integer'],
            [['name', 'notes'], 'string'],
            [['address', 'city', 'country'], 'string', 'max' => 50],
            [['zip code'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'zip code' => 'Zip Code',
            'phone' => 'Phone',
            'city' => 'City',
            'country' => 'Country',
            'notes' => 'Notes',
            'sid' => 'Sid',
        ];
    }
}
