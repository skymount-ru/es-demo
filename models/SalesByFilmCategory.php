<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sales_by_film_category".
 *
 * @property string|null $category
 * @property float|null $total_sales
 */
class SalesByFilmCategory extends ActiveRecord
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
