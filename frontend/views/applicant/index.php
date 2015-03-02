<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use frontend\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Applicants';
$this->params['breadcrumbs'][] = Yii::t('acad',
        strtoupper(Html::encode($this->title)));
//var_dump($model->load(Yii::$app->request->post()));
?>

<div class="applicant-index">

    <h1><?= Yii::t('acad', strtoupper(Html::encode($this->title))) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <!--<p>-->
    <?php // Html::a('Create Applicant', ['create'], ['class' => 'btn btn-success'])  ?>
    <!--</p>-->
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
    

    <?php Pjax::begin(['id' => 'applicants']) ?>

    <?=
    GridView::widget([
        'dataProvider'     => $dataProvider,
        'filterModel'      => $searchModel,
        'hover'            => true,
        'pjax'             => true,
        'toggleDataOptions' => [
            'all' => [
                'icon' => 'resize-full',
                'label' => Yii::t('acad', 'ALL'),
                'class' => 'btn btn-default',
                'title' => 'แสดงทุกรายการ'
            ],
            'page' => [
                'icon' => 'resize-small',
                'label' => Yii::t('acad', 'PAGE'),
                'class' => 'btn btn-default',
                'title' => 'แสดงทีละหน้า'
            ],
        ],
        'toolbar'          => [
                ['content' => 
                     Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('acad', 'Reset Grid')])
                ],
                '{toggleData}'
            ],
        'hover'            => true,
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'showPageSummary' => false,
        'panel'            => [
            'type'    => Gridview::TYPE_PRIMARY,
            'heading' => 'รายชื่อผู้ลงทะเบียน',
           'before' => '*คลิกที่ชื่อคอลัมน์เพื่อเปลี่ยนวิธีการเรียงลำดับข้อมูล'
        ],
//        'id' => 'gv-applicant',
        'pjaxSettings'     => [
            'timeout' => 'never',
           
        ],
        'columns'          => [
            [
                'class'  => 'kartik\grid\SerialColumn',
                'header' => 'ที่',
            ],
//            'id',
            [
                'attribute'     => 'school_name',
                'headerOptions' => ['style' => 'text-align: center;'],
                'label'         => Yii::t('acad', 'SCHOOL_NAME'),
            ],
            [
                'class'         => '\kartik\grid\DataColumn',
                'attribute'     => 'firstname',
//                'value' => function($model) {
//                    return $model->firstname . "  " . $model->lastname;
//                },
                'headerOptions' => ['style' => 'text-align: center;'],
//                'filterType' => GridView::FILTER_TYPEAHEAD,
                'label'         => Yii::t('acad', 'FIRSTNAME'),
            ],
            [
                'attribute'     => 'lastname',
                'headerOptions' => ['style' => 'text-align: center;'],
                'label'         => Yii::t('acad', 'LASTNAME'),
            ],
            [
                'attribute'     => 'position',
                'headerOptions' => ['style' => 'text-align: center;'],
                'label'         => Yii::t('acad', 'POSITION'),
            ],
//            'firstname',
//            'lastname',
//            'school_name',
//            'position',
//            'phone',
//            'email:email',
//            'created_at',
//            'updated_at',
//            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'export'           => false,
    ]);
    ?>

    <?php Pjax::end() ?>

</div>
