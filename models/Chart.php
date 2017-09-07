<?php

namespace yii2learning\chartbuilder\models;

use Yii;

use yii\db\Expression;
use yii\db\ActiveRecord;
use \yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
use yii\base\ErrorException;
use yii\web\NotFoundHttpException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\BlameableBehavior;
use yii\helpers\VarDumper;
use  yii2learning\chartbuilder\models\Datasource;

/**
 * This is the model class for table "{{%cb_chart}}".
 *
 * @property string $id
 * @property string $name
 * @property string $detail
 * @property string $chart_type
 * @property string $datasource_id
 * @property string $datasource_type
 * @property string $tag_name
 * @property string $display_type
 * @property string $result_id
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property string $hospcode
 * @property string $query
 * @property double $result
 * @property double $target_value
 * @property string $condition
 * @property string $options
 * @property string $xaxis
 * @property string $xaxis_label
 * @property string $series
 * @property integer $stacked
 * @property string $yaxis_label
 * @property string $title
 * @property string $sub_title
 * @property string $latest_data
 * @property string $params
 *
 * @property ChartType $chartType
 */
class Chart extends \yii\db\ActiveRecord
{
    const SCENARIO_DETAIL = 'detail';
    const SCENARIO_DATASOURCE = 'datasource';
    const SCENARIO_DISPLAY = 'display';

    public $data = [];
    public $bindingParams=[];
    public $filterModel;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cb_chart}}';
    }

    public function behaviors(){
        return [
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'tag_name',
                'immutable' => true
            ],
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'id',
                ],
                'value' => function ($event) {
                    return \thamtech\uuid\helpers\UuidHelper::uuid();
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'series',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'series'
                ],
                'value' => function ($event) {
                    return  is_array($this->series) ? implode(',',$this->series) : $this->series;
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'params',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'params'
                ],
                'value' => function ($event) {
                    return  is_array($this->params) ? implode(',',$this->params) : $this->params;
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'latest_data',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'latest_data'
                ],
                'value' => function ($event) {
                    return  is_array($this->latest_data) ? serialize($this->latest_data) : $this->latest_data;
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name','detail','tag_name'], 'required'],
            [['tag_name'], 'unique'],
            [[ 'created_by', 'updated_by','stacked'], 'integer'],
            [['detail','query','options'], 'string'],
            [['id','datasource_id','connection_id'], 'string', 'max' => 36],
            [['created_at', 'updated_at','display_type','datasource_type','series','latest_data','params','bindingParams'], 'safe'],
            [['name','xaxis_label','yaxis_label','tag_name','title','sub_title'], 'string', 'max' => 255],
            [['chart_type','xaxis'], 'string', 'max' => 100],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_DETAIL] = ['name', 'detail','tag_name'];
        $scenarios[self::SCENARIO_DATASOURCE] = ['datasource_type', 'datasource_id', 'query','params','title','sub_title'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'detail' => Yii::t('app', 'Detail'),
            'chart_type' => Yii::t('app', 'Chart Type'),
            'datasource_id' => Yii::t('app', 'Datasource ID'),
            'datasource_type' => Yii::t('app', 'Datasource Type'),
            'tag_name' => Yii::t('app', 'Tag Name'),
            'display_type' => Yii::t('app', 'Display Type'),
            'result_id' => Yii::t('app', 'Result ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'hospcode' => Yii::t('app', 'Hospcode'),
            'query' => Yii::t('app', 'Query'),
            'result' => Yii::t('app', 'Result'),
            'target_value' => Yii::t('app', 'Target Value'),
            'condition' => Yii::t('app', 'Condition'),
            'options' => Yii::t('app', 'Options'),
            'xaxis' => Yii::t('app', 'Xaxis'),
            'xaxis_label' => Yii::t('app', 'Xaxis Label'),
            'series' => Yii::t('app', 'Series'),
            'stacked' => Yii::t('app', 'Stacked'),
            'yaxis_label' => Yii::t('app', 'Yaxis Label'),
            'title' => Yii::t('app', 'Title'),
            'sub_title' => Yii::t('app', 'Sub Title'),
            'latest_data' => Yii::t('app', 'Latest Data'),
            'params' => Yii::t('app', 'Params'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChartType()
    {
        return $this->hasOne(ChartType::className(), ['code' => 'chart_type']);
    }

    /**
     * @inheritdoc
     * @return ChartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChartQuery(get_called_class());
    }
 
     public function unserializeLatestData(){
         $this->latest_data= unserialize($this->latest_data);
     }
 
     public function stringToArray($attributes){
         if(is_array($attributes)){
             foreach($attributes as $attribute){
                 $this->{$attribute} = explode(',',$this->{$attribute});
             }
         }else{
             $this->{$attributes} = explode(',',$this->{$attributes});
         }
         
     }
 
     public function getColumeSeries(){
         $newData = [];
         if(is_array($this->series)){
             foreach($this->series as $value){
                 $newData[] = [
                       'name' => $value,
                        'data' => ArrayHelper::getColumn($this->data, function($element) use ($value){
                     return (float) $element[$value];
                   })
                 ];
               }
         }
         return $newData;
     }
 
     public function getPieSeries(){
         $series= [];
         foreach($this->data as $value){
             $series[] = [
                 'name'=> $value[$this->xaxis],
                 'y'=>  (float)$value[$this->series]
             ];
         }
         return  [[
             'name'=>'Pie',
             'colorByPoint'=> true,
             'data'=> $series
         ]];
     }
 
     public function getSolidGaugeSeries(){
         $value = (float) ArrayHelper::getValue($this->data,'0.'.$this->series);
         return  [$value];
     }
 
     public function getColumnXAxis(){
         return ArrayHelper::getColumn($this->data, $this->xaxis);
     }
 
     public function isMultipleSeries(){
         $charts = [
             'SolidGauge',
             'Pie'
         ];
         return !in_array($this->chart_type,$charts);
     }
 
     public function getColumns(){
         $columns = [];
         if(count($this->data)>0){
           $keys = array_keys($this->data[0]);
           foreach($keys as $key => $value){
             $columns[$value] = $value;
           }
         }
         return $columns;
     }
 
     public function getSqlCommand(){
         if($this->datasource_type === 'datasource'){
             $datasource = $this->findModelDatasource($this->datasource_id);
             return  $datasource->query;
         }else{
             return $this->query;
       }
     }
 
     public function getDataProvider(){
         if(!empty(($sql =$this->getSqlCommand()))){
             try {
                $this->InitFilterModel();
                 $dataProvider = new SqlDataProvider([
                     'sql' => $sql,
                     'params' => $this->prepareParams(),
                     'pagination'=>false
                 ]);
                 $this->data = $dataProvider->getModels();
                 return $dataProvider;
             } catch(\yii\db\Exception $e) {
                 //Yii::$app->session->setFlash('error',$e->getMessage());
             }
         } 
         return null;
       }
 
     public function execute(){
         try {
             $this->data = [];
             $this->InitFilterModel();
             $sql = $this->getSqlCommand();
             if(!empty($sql)){
                 $con = $this->getConnection($this->connection_id);
                 $command = $con->createCommand($sql);
                 $command = $this->bindingParams($command);
                 $this->data = $command->queryAll();
             }
             return $this->data;
         } catch(\yii\db\Exception $e) {
             Yii::$app->session->setFlash('warning', $e->getMessage());
             return [];
         }
     }

     public function getConnection($id){
        try{
         return Connection::getConnection($id);
        } catch(\yii\db\Exception $e) {
            Yii::$app->session->setFlash('warning', $e->getMessage());
            return null;
        }
     }
   
     public function bindingParams($command){
         $this->prepareParams();
         if(count($this->bindingParams)>=1){
             $command->bindValues($this->bindingParams);
         }
         return $command;
     }
 
     public function prepareParams(){
         
           $newParams = [];
           $this->bindingParams = [];
           $keys = is_array($this->filterModel->attributes) ? array_keys($this->filterModel->attributes) : [];
           if(is_array($this->params)){
               foreach($this->params as $value){
                 $v = str_replace(':','',$value);
                 if(in_array($v,$keys)){
                   $newParams[$value] = $this->filterModel->attributes[$v];
                 }
                 if( $value === ':hospcode'){
                       $newParams[':hospcode'] = Yii::$app->user->identity->profile->hcode;
                 }
               }
           }
           return $this->bindingParams =  $newParams;
       }
 
       public function InitFilterModel(){
         $filterModel = new FilterForm([
             'dateRange' => date('Y-01-01').' - '.date('Y-m-d')
         ]);
         $filterModel->load(Yii::$app->request->queryParams);
         $filterModel->validate();
         $this->filterModel = $filterModel;
         return $filterModel;
      }
 
      protected function findModelDatasource($id)
      {
          if (($model = Datasource::findOne($id)) !== null) {
              return $model;
          } else {
              throw new NotFoundHttpException('The requested datasource does not exist.');
          }
      }
 
      public function getOptions(){
         $options = [];
         try{
             eval($this->options);
         } catch(\ParseError $e) {
             Yii::$app->session->setFlash('error',$e->getMessage());;
         }
         return $options;
      }
}
