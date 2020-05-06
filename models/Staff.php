<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "staff".
 *
 * @property int $staff_id
 * @property string $first_name
 * @property string $last_name
 * @property int $address_id
 * @property string|null $email
 * @property int $store_id
 * @property bool $active
 * @property string $username
 * @property string|null $password
 * @property string $last_update
 * @property resource|null $picture
 *
 * @property Payment[] $payments
 * @property Rental[] $rentals
 * @property Address $address
 * @property Store $store
 */
class Staff extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'address_id', 'store_id', 'username'], 'required'],
            [['address_id', 'store_id'], 'default', 'value' => null],
            [['address_id', 'store_id'], 'integer'],
            [['active'], 'boolean'],
            [['last_update'], 'safe'],
            [['picture'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 45],
            [['email'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 16],
            [['password'], 'string', 'max' => 40],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address_id' => 'Address ID',
            'email' => 'Email',
            'store_id' => 'Store ID',
            'active' => 'Active',
            'username' => 'Username',
            'password' => 'Password',
            'last_update' => 'Last Update',
            'picture' => 'Picture',
        ];
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['staff_id' => 'staff_id']);
    }

    /**
     * Gets query for [[Rentals]].
     *
     * @return ActiveQuery
     */
    public function getRentals()
    {
        return $this->hasMany(Rental::className(), ['staff_id' => 'staff_id']);
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
     * Gets query for [[Store]].
     *
     * @return ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['manager_staff_id' => 'staff_id']);
    }
}
