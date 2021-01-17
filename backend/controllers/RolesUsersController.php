<?php

namespace backend\controllers;

use Yii;
use common\models\RolesUsers;
use common\models\RolesUsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RolesUsersController implements the CRUD actions for RolesUsers model.
 */
class RolesUsersController extends Controller
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
     * Lists all RolesUsers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolesUsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RolesUsers model.
     * @param integer $role_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($role_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($role_id, $user_id),
        ]);
    }

    /**
     * Creates a new RolesUsers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RolesUsers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'role_id' => $model->role_id, 'user_id' => $model->user_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RolesUsers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $role_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($role_id, $user_id)
    {
        $model = $this->findModel($role_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'role_id' => $model->role_id, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RolesUsers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $role_id
     * @param integer $user_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($role_id, $user_id)
    {
        $this->findModel($role_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RolesUsers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $role_id
     * @param integer $user_id
     * @return RolesUsers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($role_id, $user_id)
    {
        if (($model = RolesUsers::findOne(['role_id' => $role_id, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
