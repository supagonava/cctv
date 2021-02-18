<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $name ชื่อสินค้า
 * @property int $category_id หมวดหมู่
 * @property float $price ราคา
 * @property string $description รายละเอียด
 * @property int|null $store_id ของร้าน
 *
 * @property Ordersproducts[] $ordersproducts
 * @property Categories $category
 * @property Store $store
 * @property Productscontent[] $productscontents
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'price', 'description'], 'required'],
            
            [['category_id', 'store_id'], 'integer'],
            [['price'], 'number'],
            [['name', 'description'], 'string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['store_id'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['store_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อสินค้า',
            'category_id' => 'หมวดหมู่',
            'price' => 'ราคา',
            'description' => 'รายละเอียด',
            'store_id' => 'ของร้าน',
        ];
    }

    /**
     * Gets query for [[Ordersproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersproducts()
    {
        return $this->hasMany(Ordersproducts::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Store]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }

    /**
     * Gets query for [[Productscontents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductscontents()
    {
        return $this->hasMany(Productscontent::className(), ['product_id' => 'id']);
    }
}
