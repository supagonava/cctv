<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotationcontent".
 *
 * @property int $id
 * @property string|null $file_path รูปภาพ
 * @property string|null $description รายละเอียด
 * @property int $q_id รหัสใบเสนอราคา
 *
 * @property Quotation $q
 */
class Quotationcontent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotationcontent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'q_id'], 'required'],
            [['id', 'q_id'], 'integer'],
            [['file_path', 'description'], 'string'],
            [['id'], 'unique'],
            [['q_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quotation::className(), 'targetAttribute' => ['q_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_path' => 'รูปภาพ',
            'description' => 'รายละเอียด',
            'q_id' => 'รหัสใบเสนอราคา',
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
}
