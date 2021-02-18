<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property int $id
 * @property string|null $Room_Size ขนาดห้อง
 * @property float|null $bugget งบประมาณที่มี
 * @property int|null $user_id ผู้เสนอราคา
 * @property string $create_at ทำรายการเมื่อ
 * @property string|null $status สถานะใบเสนอราคา
 *
 * @property Users $user
 * @property Quotationcontent[] $quotationcontents
 * @property ReplySheet[] $replySheets
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Room_Size'], 'string'],
            [['bugget'], 'number'],
            [['user_id'], 'integer'],
            [['create_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
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
            'Room_Size' => 'ขนาดห้อง',
            'bugget' => 'งบประมาณที่มี',
            'user_id' => 'ผู้เสนอราคา',
            'create_at' => 'ทำรายการเมื่อ',
            'status' => 'สถานะใบเสนอราคา',
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
     * Gets query for [[Quotationcontents]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuotationcontents()
    {
        return $this->hasMany(Quotationcontent::className(), ['q_id' => 'id']);
    }

    /**
     * Gets query for [[ReplySheets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReplySheets()
    {
        return $this->hasMany(ReplySheet::className(), ['q_id' => 'id']);
    }
}
