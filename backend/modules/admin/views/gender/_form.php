<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use yii\widgets\ActiveForm;
//use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Gender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gender-form">
   <?php $form = ActiveForm::begin([
       'layout' => 'inline',
       'fieldConfig' => [
            'template' => "{beginWrapper}\n{beginLabel}\n{label}\n{endLabel}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-lg-5',
//                'offset' => 'col-lg-offset-6',
                'wrapper' => 'col-lg-7',
                'error' => '',
                'hint' => '',
                'enableLabel'=>true,
                

            ],
        ],
    ]);
   ?>
    <?= $form->field($model,'name',[
        'labelOptions' => ['class' => 'col-lg-2 '],
        ])
    ?>

    <!--<div class="form-group">-->
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <!--</div>-->


    <?php ActiveForm::end(); ?>

</div>
