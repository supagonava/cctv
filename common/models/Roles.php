<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string $name ชื่อบทบาท
 * @property string $description คำอธิบายเช่น สามารถจัดการสินค้าได้,ตั้งค่าที่อยู่ได้
 *
 * @property RolesUsers[] $rolesUsers
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'description'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อบทบาท',
            'description' => 'คำอธิบายเช่น สามารถจัดการสินค้าได้,ตั้งค่าที่อยู่ได้',
        ];
    }

    /**
     * Gets query for [[RolesUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRolesUsers()
    {
        return $this->hasMany(RolesUsers::className(), ['role_id' => 'id']);
    }
}
