<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_by_store".
 *
 * @property string|null $store
 * @property string|null $manager
 * @property float|null $total_sales
 */
class SalesByStore extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_by_store';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['store', 'manager'], 'string'],
            [['total_sales'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'store' => 'Store',
            'manager' => 'Manager',
            'total_sales' => 'Total Sales',
        ];
    }
}
