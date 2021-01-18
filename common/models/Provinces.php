<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "provinces".
 *
 * @property int $id
 * @property int $code
 * @property string $name_in_thai
 * @property string $name_in_english
 *
 * @property Districts[] $districts
 */
class Provinces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name_in_thai', 'name_in_english'], 'required'],
            [['code'], 'integer'],
            [['name_in_thai', 'name_in_english'], 'string', 'max' => 150],
            [['code'], 'unique'],
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
        ];
    }

    /**
     * Gets query for [[Districts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(Districts::className(), ['province_id' => 'id']);
    }
}
