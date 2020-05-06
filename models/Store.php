<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "store".
 *
 * @property int $store_id
 * @property int $manager_staff_id
 * @property int $address_id
 * @property string $last_update
 *
 * @property Address $address
 * @property Staff $managerStaff
 */
class Store extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['manager_staff_id', 'address_id'], 'required'],
            [['manager_staff_id', 'address_id'], 'default', 'value' => null],
            [['manager_staff_id', 'address_id'], 'integer'],
            [['last_update'], 'safe'],
            [['manager_staff_id'], 'unique'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
            [['manager_staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['manager_staff_id' => 'staff_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'store_id' => 'Store ID',
            'manager_staff_id' => 'Manager Staff ID',
            'address_id' => 'Address ID',
            'last_update' => 'Last Update',
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
     * Gets query for [[ManagerStaff]].
     *
     * @return ActiveQuery
     */
    public function getManagerStaff()
    {
        return $this->hasOne(Staff::className(), ['staff_id' => 'manager_staff_id']);
    }
}
