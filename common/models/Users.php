<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username ชื่อผู้ใช้
 * @property string $password_hash รหัสผ่าน
 * @property string $firstname ชื่อ
 * @property string $lastname นามสกุล
 * @property string|null $sex เพศ
 * @property string|null $dob วันเกิด
 * @property string|null $phone เบอร์โทรศัพท์
 * @property string|null $email อีเมล์
 * @property string|null $lineId ไลน์
 * @property string|null $facebook เฟสบุค
 *
 * @property Address[] $addresses
 * @property Orders[] $orders
 * @property Quotation[] $quotations
 * @property RolesUsers[] $rolesUsers
 * @property Store[] $stores
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'firstname', 'lastname'], 'required'],
            [['password_hash', 'facebook'], 'string'],
            [['dob'], 'safe'],
            [['username', 'firstname', 'lastname'], 'string', 'max' => 50],
            [['sex', 'phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['lineId'], 'string', 'max' => 70],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'ชื่อผู้ใช้',
            'password_hash' => 'รหัสผ่าน',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'sex' => 'เพศ',
            'dob' => 'วันเกิด',
            'phone' => 'เบอร์โทรศัพท์',
            'email' => 'อีเมล์',
            'lineId' => 'ไลน์',
            'facebook' => 'เฟสบุค',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Quotations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuotations()
    {
        return $this->hasMany(Quotation::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[RolesUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRolesUsers()
    {
        return $this->hasMany(RolesUsers::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Stores]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(Store::className(), ['user_id' => 'id']);
    }
}
