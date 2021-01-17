<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $user_id
 * @property string $shipment_method ประเภทขนส่ง
 * @property string $tracking_number เลขพัสดุ
 * @property string $date วันที่
 * @property string $file_slip สลิป
 * @property float $total_price ราคา
 * @property string $status สถานะ
 *
 * @property Users $user
 * @property Ordersproducts[] $ordersproducts
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'shipment_method', 'tracking_number', 'date', 'file_slip', 'total_price', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['shipment_method', 'tracking_number', 'file_slip'], 'string'],
            [['date'], 'safe'],
            [['total_price'], 'number'],
            [['status'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'shipment_method' => 'ประเภทขนส่ง',
            'tracking_number' => 'เลขพัสดุ',
            'date' => 'วันที่',
            'file_slip' => 'สลิป',
            'total_price' => 'ราคา',
            'status' => 'สถานะ',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Ordersproducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdersproducts()
    {
        return $this->hasMany(Ordersproducts::className(), ['order_id' => 'id']);
    }
}
