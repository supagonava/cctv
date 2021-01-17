<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ordersproducts".
 *
 * @property int $product_id สินค้า
 * @property int $order_id รหัสออเดอร์
 * @property int $qty จำนวน (ชิ้น)
 *
 * @property Orders $order
 * @property Products $product
 */
class Ordersproducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordersproducts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'order_id', 'qty'], 'required'],
            [['product_id', 'order_id', 'qty'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'สินค้า',
            'order_id' => 'รหัสออเดอร์',
            'qty' => 'จำนวน (ชิ้น)',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
