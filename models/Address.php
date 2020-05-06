<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "address".
 *
 * @property int $address_id
 * @property string $address
 * @property string|null $address2
 * @property string $district
 * @property int $city_id
 * @property string|null $postal_code
 * @property string $phone
 * @property string $last_update
 *
 * @property City $city
 * @property Customer[] $customers
 * @property Staff[] $staff
 * @property Store[] $stores
 */
class Address extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'district', 'city_id', 'phone'], 'required'],
            [['city_id'], 'default', 'value' => null],
            [['city_id'], 'integer'],
            [['last_update'], 'safe'],
            [['address', 'address2'], 'string', 'max' => 50],
            [['district', 'phone'], 'string', 'max' => 20],
            [['postal_code'], 'string', 'max' => 10],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'city_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'address' => 'Address',
            'address2' => 'Address2',
            'district' => 'District',
            'city_id' => 'City ID',
            'postal_code' => 'Postal Code',
            'phone' => 'Phone',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['city_id' => 'city_id']);
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['address_id' => 'address_id']);
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['address_id' => 'address_id']);
    }

    /**
     * Gets query for [[Stores]].
     *
     * @return ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['address_id' => 'address_id']);
    }
}
