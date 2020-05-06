<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property int $store_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property int $address_id
 * @property bool $activebool
 * @property string $create_date
 * @property string|null $last_update
 * @property int|null $active
 *
 * @property Address $address
 * @property Payment[] $payments
 * @property Rental[] $rentals
 */
class Customer extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store_id', 'first_name', 'last_name', 'address_id'], 'required'],
            [['store_id', 'address_id', 'active'], 'default', 'value' => null],
            [['store_id', 'address_id', 'active'], 'integer'],
            [['activebool'], 'boolean'],
            [['create_date', 'last_update'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'store_id' => 'Store ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'address_id' => 'Address ID',
            'activebool' => 'Activebool',
            'create_date' => 'Create Date',
            'last_update' => 'Last Update',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address_id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * Gets query for [[Rentals]].
     *
     * @return ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['customer_id' => 'customer_id']);
    }
}
