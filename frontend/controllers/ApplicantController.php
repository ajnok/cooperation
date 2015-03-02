<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Applicant;
use frontend\models\ApplicantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ApplicantController implements the CRUD actions for Applicant model.
 */
class ApplicantController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Applicant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel  = new ApplicantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model        = new Applicant();
        
//        return $this->render('confirm',['model'=>$model]);
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
//            return $this->render('confirm',['model'=>$model]);
            
//            $model->save();
            $applicant = $model->firstname . ' ' . $model->lastname . ' ได้ทำการลงทะเบียนแล้วในลำดับที่ ' . $model->id;
            
            $model = new Applicant(); //reset model
            Yii::$app->getSession()->setFlash('success','คุณ ' . $applicant .' ' ,true);
          
            
//            return $this->render('confirm',['model'=>$model]);
        }
//        if ($model->load(Yii::$app->request->post()) ) {
////           return $this->redirect((['view', 'id' => $model->id]));
//            return $this->redirect('confirm',['model'=>$model]);
//        }
            return $this->render('index',
                    [
                    'searchModel'  => $searchModel,
                    'dataProvider' => $dataProvider,
                    'model'        => $model,
            ]);

        
//return $this->render('confirm');

//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Displays a single Applicant model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view',
                [
                'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Applicant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Applicant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create',
                    [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Applicant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update',
                    [
                    'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Applicant model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Applicant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Applicant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Applicant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}