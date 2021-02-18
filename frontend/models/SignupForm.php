<?php

namespace frontend\models;

use common\models\LoginForm;
use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Users;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $firstname, $lastname, $dob, $sex, $phone, $facebook, $lineId;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], "required"],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [["dob", 'sex', 'phone', 'facebook', 'lineId'], "safe"],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new Users();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->dob = $this->dob;
        $user->sex = $this->sex;
        $user->phone = $this->phone;
        $user->facebook = $this->facebook;
        $user->lineId = $this->lineId;
        $user->generateAuthKey();
        $user->save();
        return $user;
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
