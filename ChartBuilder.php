<?php

namespace yii2learning\chartbuilder;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii2learning\chartbuilder\models\Chart;
use yii2learning\chartbuilder\models\chartType;
use yii2learning\chartbuilder\models\Datasource;
use yii\web\NotFoundHttpException;;

class ChartBuilder extends Widget
{
    public $chartId;
    public $filter = [];
    public $model = null;
    public $dataProvider;
    public $filterModel;
    public $title;

    public function init()
    {
        parent::init();

        if ($this->chartId === null) {
            throw new InvalidConfigException('The "chart id" property must be set.');
        }
        
        if($this->model === null) {
            $this->getModel();
            $this->model->execute();
            $this->title = empty($this->title) ? $this->model->name: $this->title;
        }
    }

    public function getModel(){
       return   $this->model !== null ?  $this->model  : $this->findModel($this->chartId);
    }

    public function getChartType(){
        return $this->model->chart_type;
     }

    protected function findModel($id)
    {
        if (($model = Chart::findOne($id)) !== null) {
            $model->stringToArray('params');
            if($model->isMultipleSeries()){
                $model->stringToArray('series');
            }
            $this->model =  $model;
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

    public function run()
    {
            if(!empty($this->getChartType())){
                $view = $this->getChartType();
                return $this->render("/widget/".$view,[
                    'chartId' => $this->chartId,
                    'model'=> $this->model,
                    'title'=> $this->title
                ]);
            }

        try {
            
            } catch (ErrorException $e)  {
                //throw new ErrorException($e->getMessage());
            }
    }
}
