<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use  yii2learning\chartbuilder\models\ChartType;
use  yii2learning\chartbuilder\models\Datasource;
use  yii2learning\chartbuilder\models\Connection;
/* @var $this yii\web\View */
/* @var $model frontend\modules\dashboard\models\Chart */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
 <h1><?= Html::encode($this->title) ?></h1>
<?= $this->render('_menus',['model'=>$model]) ?>

<div class="chart-form">

    <?php $form = ActiveForm::begin(); ?>

       <div class="row">
            <div class="col-md-4">
                    <?= $form->field($model, 'datasource_type')->inline()->radioList(['query'=>'Query','datasource'=>'Data Source']); ?>
            </div>
            <div class="col-md-5">
                <?= $form->field($model, 'datasource_id')->widget(Select2::classname(), [
                        'data' => Datasource::find()->select('name')->indexBy('id')->column(),
                        'options' => ['id'=>'dd-datasource_id','placeholder' => 'Select Datasource ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                ]); ?>
            </div>
       </div>
       <?= $form->field($model, 'connection_id')->widget(Select2::classname(), [
                        'data' => array_merge(['db'=>'Defalut'],Connection::find()->select('connection_name')->indexBy('id')->column()),
                        'options' => ['placeholder' => 'Select Connection ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                ]); ?>
                
        <div class="panel panel-default panel-body">
            <?= $form->field($model, 'query')->widget('trntv\aceeditor\AceEditor',[
                    'mode'=>'sql',
                    'theme'=>'github',
                    //'readOnly' => true
                ]) ?>
        </div>
      
       <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'tag_name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'params')->widget(Select2::classname(), [
                        'options' => [
                            'placeholder' => 'เพิ่มตัวแปร ...',
                            'multiple' =>true
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'tags' => true,
                            'tokenSeparators' => [',']
                        ],
                ]); ?>
            </div>
       </div>

<hr>

    <div class="form-group">
        <?= Html::submitButton('Execute', ['value'=>1,'name'=>'btn-execute','class' =>  'btn btn-default']) ?>
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<?php 
if(!empty($filterModel)): 
    echo $this->render('_filter',[
            'model'=>$filterModel,
            'pjaxId'=>'#gridview-datasource-pjax'
    ]); 
endif;?>
<br>
<div class="panel panel-default panel-body">
    <?php if(!empty($dataProvider)): 
            echo GridView::widget([
                'id'=>'gridview-datasource',
                'pjax'=>true,
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class'=>'table table-striped'],
            ]); 
            ?>
        <?php   endif;?>
</div>
