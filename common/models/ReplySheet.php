<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reply_sheet".
 *
 * @property int $id
 * @property float $real_price ราคาจริง
 * @property string $description คำอธิบาย
 * @property int|null $store_id ผู้ตอบใบเสนอราคา
 * @property int $q_id ใบเสนอราคา
 *
 * @property Quotation $q
 * @property Store $store
 */
class ReplySheet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reply_sheet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['real_price', 'description', 'q_id'], 'required'],
            [['real_price'], 'number'],
            [['description'], 'string'],
            [['store_id', 'q_id'], 'integer'],
            [['q_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quotation::className(), 'targetAttribute' => ['q_id' => 'id']],
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
            'real_price' => 'ราคาจริง',
            'description' => 'คำอธิบาย',
            'store_id' => 'ผู้ตอบใบเสนอราคา',
            'q_id' => 'ใบเสนอราคา',
        ];
    }

    /**
     * Gets query for [[Q]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQ()
    {
        return $this->hasOne(Quotation::className(), ['id' => 'q_id']);
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
}
