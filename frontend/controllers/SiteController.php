<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Products;
use common\models\Quotation;
use common\models\Quotationcontent;
use common\models\Users;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup', 'estimate-price', 'quatation-list', 'remove-quatation', 'remove-quatation-content'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'estimate-price'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $products = Products::find()->orderBy("name")->all();
        return $this->render('index', ["products" => $products]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = new Users();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->setPassword($model->password);
            $user->firstname = $model->firstname;
            $user->lastname = $model->lastname;
            $user->dob = $model->dob;
            $user->sex = $model->sex;
            $user->phone = $model->phone;
            $user->facebook = $model->facebook;
            $user->lineId = $model->lineId;
            $user->generateAuthKey();
            if ($user->save()) {
                Yii::$app->user->login($user);
            } else {
                return $this->goBack();
            }
            return $this->goHome();
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionProductView($id)
    {
        $product = Products::findOne($id);
        return $this->render("product-view", ["product" => $product]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionEstimatePrice()
    {
        $quatation = new Quotation();
        if (isset($_GET["id"])) {
            $quatation = Quotation::findOne($_GET["id"]);
        }
        if ($quatation->load(Yii::$app->request->post())) {
            $quatation->user_id = Yii::$app->user->identity->id;
            if ($quatation->save()) {
                foreach ($_FILES["image"]["name"] as $key => $file) :
                    $quatationContent = new Quotationcontent();
                    $uploadModel = new \common\models\MyFileUpload(); // ประกาศตัวแปรอัปโหลดภาพ
                    if (!empty($file)) {
                        $quatationContent->file_path = $uploadModel->UploadImage("image[$key]", "images")["data"];
                    }
                    $quatationContent->q_id = $quatation->id;
                    $quatationContent->save();
                endforeach;
                Yii::$app->session->setFlash('success', "บันทึกข้อมูลใบเสนอราคาเรียบร้อย");
            } else {
                Yii::$app->session->setFlash('error', "บันทึกข้อมูลใบเสนอราคาล้มเหลว");
            }
            return $this->redirect(["site/quatation-list"]);
        }
        return $this->render("estimate-price", ["quatation" => $quatation]);
    }

    public function actionRemoveQuatationContent($id)
    {
        Quotationcontent::deleteAll(["id" => $id]);
        Yii::$app->session->setFlash('success', "ลบข้อมูลเรียบร้อยแล้ว");
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionRemoveQuatation($id)
    {
        Quotation::deleteAll(["id" => $id]);
        Yii::$app->session->setFlash('success', "ลบข้อมูลเรียบร้อยแล้ว");
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionQuatationList()
    {
        $quatationList = Users::findOne(Yii::$app->user->identity->id)->quotations;
        return $this->render("quatation-list", ["quatationList" => $quatationList]);
    }
}
