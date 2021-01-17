<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productscontent".
 *
 * @property int $id
 * @property int $product_id สินค้า
 * @property string $file_path รูป
 * @property string $description รายละเอียดรูป
 *
 * @property Products $product
 */
class Productscontent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productscontent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'file_path', 'description'], 'required'],
            [['product_id'], 'integer'],
            [['file_path', 'description'], 'string'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'สินค้า',
            'file_path' => 'รูป',
            'description' => 'รายละเอียดรูป',
        ];
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
