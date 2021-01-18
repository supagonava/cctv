<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "subdistricts".
 *
 * @property int $id
 * @property int $code
 * @property string $name_in_thai
 * @property string|null $name_in_english
 * @property float $latitude
 * @property float $longitude
 * @property int $district_id
 * @property int|null $zip_code
 *
 * @property Districts $district
 */
class Subdistricts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subdistricts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name_in_thai', 'latitude', 'longitude', 'district_id'], 'required'],
            [['code', 'district_id', 'zip_code'], 'integer'],
            [['latitude', 'longitude'], 'number'],
            [['name_in_thai', 'name_in_english'], 'string', 'max' => 150],
            [['code'], 'unique'],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['district_id' => 'id']],
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
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'district_id' => 'District ID',
            'zip_code' => 'Zip Code',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }
}
