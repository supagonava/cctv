<?php

namespace backend\controllers;

use Yii;
use common\models\Quotationcontent;
use common\models\QuotationcontentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuotationcontentController implements the CRUD actions for Quotationcontent model.
 */
class QuotationcontentController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Quotationcontent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuotationcontentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Quotationcontent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Quotationcontent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Quotationcontent();
        $uploadModel = new \common\models\MyFileUpload(); // ประกาศตัวแปรอัปโหลดภาพ
        $file = $_FILES; //ตัวแปรรับไฟล์ที่เข้ามาจาก ฟอร์ม
        //Quotationcontent[file_path]
        
        if ($model->load(Yii::$app->request->post())) { //ถ้ากดบันทึก
            
            if (!empty($file["Quotationcontent"]["name"]["file_path"])) {
                $model->file_path = $uploadModel->UploadImage("Quotationcontent[file_path]", "images")["data"];
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Quotationcontent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadModel = new \common\models\MyFileUpload(); // ประกาศตัวแปรอัปโหลดภาพ
        $file = $_FILES; //ตัวแปรรับไฟล์ที่เข้ามาจาก ฟอร์ม
        //Quotationcontent[file_path]

        if ($model->load(Yii::$app->request->post())) { //ถ้ากดบันทึก

            // ถ้ามีไฟล์รูปภาพมา [ชื่อโมเดล][name][ฟิลด์รูปภาพ]
            if (!empty($file["Quotationcontent"]["name"]["file_path"])) {
                $model->file_path = $uploadModel->UploadImage("Quotationcontent[file_path]", "images")["data"];
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [ //เปิดหน้าแก้ไข
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Quotationcontent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Quotationcontent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Quotationcontent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Quotationcontent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
