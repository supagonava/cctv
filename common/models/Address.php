<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string|null $home_no บ้านเลขที่
 * @property string|null $village หมู่ที่
 * @property string|null $road ถนน
 * @property string|null $zoi ซอย
 * @property string|null $district ตำบล
 * @property string|null $amphures อำเภอ
 * @property string|null $province จังหวัด
 * @property string|null $post_code รหัสไปรษณีย์
 * @property int|null $user_id สำหรับผู้ใช้
 * @property int|null $store_id สำหรับร้านค้า
 *
 * @property Users $user
 * @property Store $store
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'store_id'], 'integer'],
            [['home_no'], 'string', 'max' => 6],
            [['village', 'road', 'zoi'], 'string', 'max' => 50],
            [['district', 'amphures', 'province'], 'string', 'max' => 100],
            [['post_code'], 'string', 'max' => 10],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'home_no' => 'บ้านเลขที่',
            'village' => 'หมู่ที่',
            'road' => 'ถนน',
            'zoi' => 'ซอย',
            'district' => 'ตำบล',
            'amphures' => 'อำเภอ',
            'province' => 'จังหวัด',
            'post_code' => 'รหัสไปรษณีย์',
            'user_id' => 'สำหรับผู้ใช้',
            'store_id' => 'สำหรับร้านค้า',
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
     * Gets query for [[Store]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'store_id']);
    }
}
