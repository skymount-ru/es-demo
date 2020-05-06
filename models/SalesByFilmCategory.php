<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_by_film_category".
 *
 * @property string|null $category
 * @property float|null $total_sales
 */
class SalesByFilmCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_by_film_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_sales'], 'number'],
            [['category'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category' => 'Category',
            'total_sales' => 'Total Sales',
        ];
    }
}
