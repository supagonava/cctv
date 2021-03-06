<?php

namespace common\models;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Users extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    // Normal model
    public static function tableName()
    {
        return 'users';
    }


    public function rules()
    {
        return [
            [['username', 'password_hash', 'firstname', 'lastname'], 'required'],
            [['password_hash', 'facebook'], 'string'],
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['username', 'firstname', 'lastname'], 'string', 'max' => 50],
            [['sex', 'phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['lineId'], 'string', 'max' => 70],
            [['auth_key'], 'string', 'max' => 255],
        ];
    }

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
            'auth_key' => 'Auth Key',
            'created_at' => 'Create At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAddresses()
    {
        return $this->hasMany(Address::className(), ['user_id' => 'id']);
    }

    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['user_id' => 'id']);
    }

    public function getQuotations()
    {
        return $this->hasMany(Quotation::className(), ['user_id' => 'id']);
    }

    public function getRolesUsers()
    {
        return $this->hasMany(RolesUsers::className(), ['user_id' => 'id']);
    }

    public function getStores()
    {
        return $this->hasMany(Store::className(), ['user_id' => 'id']);
    }

    public function signup()
    {
        $this->password_hash = password_hash($this->password_hash, PASSWORD_BCRYPT);
        if ($this->save()) {
            $roleUser = new RolesUsers();
            $roleUser->load(["RolesUsers" => ["user_id" => $this->id, "role_id" => 30]]);
            if ($roleUser->save()) {
                return true;
            }
        }
        return false;
    }

    // Identity Interface
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token
        ]);
    }

    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
