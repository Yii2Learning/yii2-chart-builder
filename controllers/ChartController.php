<?php

namespace yii2learning\chartbuilder\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii2learning\chartbuilder\models\Chart;
use yii2learning\chartbuilder\models\ChartSearch;
use yii2learning\chartbuilder\models\Datasource;
use yii2learning\chartbuilder\models\DatasourceSearch;


/**
 * ChartController implements the CRUD actions for Chart model.
 */
class ChartController extends Controller
{
        /**
     * @inheritdoc
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
             'access' => [
                 'class' => AccessControl::className(),
                 'rules' => [
                     [
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                 ],
             ]
         ];
     }
 
     /**
      * Lists all Chart models.
      * @return mixed
      */
     public function actionIndex()
     {
         $searchModel = new ChartSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
     }
 
     /**
      * Displays a single Chart model.
      * @param integer $id
      * @return mixed
      */
     public function actionView($id)
     {
         $model = $this->findModel($id);
         $model->execute();
         $filterModel = $model->filterModel;
         return $this->render('view', [
             'model' => $model,
             'filterModel' => $filterModel
         ]);
     }
 
     /**
      * Creates a new Chart model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionCreate()
     {
         $model = new Chart([
             'scenario' => Chart::SCENARIO_DETAIL
         ]);
 
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['update', 'id' => $model->id]);
         } else {
             return $this->render('create', [
                 'model' => $model
             ]);
         }
     }
 
     /**
      * Updates an existing Chart model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id)
     {
         $model = $this->findModel($id);
 
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['datasource', 'id' => $model->id]);
         } else {
             return $this->render('update', [
                 'model' => $model
             ]);
         }
     }
     
     public function actionDatasource($id)
     {
         $model = $this->findModel($id);
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             if(Yii::$app->request->post('btn-execute',0) == 1){
                 $this->refresh();
             }else{
                 return $this->redirect(['preview', 'id' => $model->id]);
             }
         } else {

            $model->execute();
             $filterModel = $model->filterModel;
             $dataProvider = $model->getDataProvider();
             return $this->render('datasource', [
                 'model' => $model,
                 'filterModel' => $filterModel,
                 'dataProvider' => $dataProvider
             ]);
         }
     }
 
     public function actionPreview($id)
     {
         $model = $this->findModel($id);
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['preview', 'id' => $model->id]);
         } else {
             $model->execute();
             $filterModel = $model->filterModel;
             $dataProvider = $model->getDataProvider();
             return $this->render('preview', [
                 'model' => $model,
                 'filterModel' => $filterModel,
                 'dataProvider' => $dataProvider
             ]);
         }
     }
 
     /**
      * Deletes an existing Chart model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id)
     {
         $this->findModel($id)->delete();
 
         return $this->redirect(['index']);
     }
 
     /**
      * Finds the Chart model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Chart the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id)
     {
         if (($model = Chart::findOne($id)) !== null) {
             $model->stringToArray('params');
             if($model->isMultipleSeries()){
                 $model->stringToArray('series');
             }
             return $model;
         } else {
             throw new NotFoundHttpException('The requested chart does not exist.');
         }
     }
 
     protected function findModelDatasource($id)
     {
         if (($model = ChartResource::findOne($id)) !== null) {
             return $model;
         } else {
             throw new NotFoundHttpException('The requested datasource does not exist.');
         }
     }
     
     protected function findModelKpi($id)
     {
         if (($model = Kpi::findOne($id)) !== null) {
             return $model;
         } else {
             return new Kpi([
                 'id' => $id
             ]);
         }
     }
 
     public function actionDuplicate($id){
         $model = $this->findModel($id);
         if(isset($model->kpi)){
             $modelKpi = $model->kpi;
             $modelKpi->isNewRecord = true;
         }
         $model->isNewRecord = true;
         $model->name = $model->name.'-COPY';
         if($model->save()){
             $modelKpi->id = $model->id;
             $modelKpi->save();
         }
         return $this->redirect(['update', 'id' => $model->id]);
     }
}
