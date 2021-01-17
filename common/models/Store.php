<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "store".
 *
 * @property int $id
 * @property string $name ชื่อร้านค้า
 * @property string $facebook เฟสร้าน
 * @property string $www URL ร้านค้า
 * @property string $line ID ไลน์ร้านค้า
 * @property string $longtitude ลองติจูด
 * @property string $Latitude ละติจูด
 * @property string $map URL URL แผนที่ร้าน
 * @property int $user_id เจ้าของร้าน
 *
 * @property Address[] $addresses
 * @property ReplySheet[] $replySheets
 * @property Users $user
 */
class Store extends \yii\db\ActiveRecord
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
            [['id', 'name', 'facebook', 'www', 'line ID', 'longtitude', 'Latitude', 'map URL', 'user_id'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['facebook', 'www', 'map URL'], 'string'],
            [['name', 'longtitude', 'Latitude'], 'string', 'max' => 100],
            [['line ID'], 'string', 'max' => 80],
            [['id'], 'unique'],
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
            'name' => 'ชื่อร้านค้า',
            'facebook' => 'เฟสร้าน',
            'www' => 'URL ร้านค้า',
            'line ID' => 'ไลน์ร้านค้า',
            'longtitude' => 'ลองติจูด',
            'Latitude' => 'ละติจูด',
            'map URL' => 'URL แผนที่ร้าน',
            'user_id' => 'เจ้าของร้าน',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['store_id' => 'id']);
    }

    /**
     * Gets query for [[ReplySheets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplySheets()
    {
        return $this->hasMany(ReplySheet::className(), ['store_id' => 'id']);
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
}