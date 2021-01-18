<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property int $code
 * @property string $name_in_thai
 * @property string $name_in_english
 * @property int $province_id 
 *
 * @property Provinces $province
 * @property Subdistricts[] $subdistricts
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name_in_thai', 'name_in_english', 'province_id'], 'required'],
            [['code', 'province_id'], 'integer'],
            [['name_in_thai', 'name_in_english'], 'string', 'max' => 150],
            [['code'], 'unique'],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name_in_thai' => 'Name In Thai',
            'name_in_english' => 'Name In English',
            'province_id' => 'Province ID',
        ];
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Provinces::className(), ['id' => 'province_id']);
    }

    /**
     * Gets query for [[Subdistricts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistricts()
    {
        return $this->hasMany(Subdistricts::className(), ['district_id' => 'id']);
    }
}
