<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\GenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Genders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-index">

    <h1><?= "ข้อมูลหลัก - " . Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= $this->render('_form',['model' => $model,]); ?>
    <?php Pjax::begin(['id' => 'gender']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'name',
            'created_at',
            'updated_at',
            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'export' => false,

    ]);
    ?>

    <?php Pjax::end() ?>

</div>
