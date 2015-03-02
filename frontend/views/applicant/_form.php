<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\widgets\Pjax;
use kartik\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model frontend\models\Applicant */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs(
        '$("document").ready(function(){
        $("#new_applicant").on("pjax:end", function() {
            $.pjax.reload({container:"#applicants"});  //Reload GridView
        });
        
    });'
);
?>

<div class="applicant-form">
   
    <?php Pjax::begin(['id' => 'new_applicant']) ?>
    <?php
    $str = Html::a(' คลิกที่นี่เพื่อกลับไปยังหน้าแรก', ['site/index']);
    $str = $str . '<br />' . '<i class="glyphicon glyphicon-info-sign"></i> หากท่านต้องการแก้ไขข้อมูลหรือยกเลิกการทำรายการโปรดติดต่อ อ.ธีรศิลป์ กันธา โทร. 081-1118176';
if (Yii::$app->session->hasFlash('success')) {
    Yii::$app->session->getAllFlashes();
//    echo("OOOL");
    echo Alert::widget([
        'type'=> Alert::TYPE_SUCCESS,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body'=> Yii::$app->session->getFlash('success') . $str,
//        'delay' => 6000
    ]);
}else if((Yii::$app->session->hasFlash('warning'))) {
    Yii::$app->session->getAllFlashes();
//    echo("OOOL");
    echo Alert::widget([
        'type'=> Alert::TYPE_WARNING,
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body'=> Yii::$app->session->getFlash('warning') . $str,
        'delay' => 2000
    ]);
}
?>
    <?php
    $form = ActiveForm::begin([
                'options' => ['data-pjax' => 'true'],
                'type' => ActiveForm::TYPE_VERTICAL,
//            'fieldConfig' => [
//                'template' => '{label}{input}'
//            ]
    ]);
    ?>
    <div class="row" >
        <div class="col-lg-6">
            <?=
            Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 3,
                'attributes' => [
                    'school_name' => ['type' => Form::INPUT_TEXT, 'options' => ['maxlength' => 100,
                            'placeholder' => 'ป้อนชื่อโรงเรียน'],'label'=>Yii::t('acad','SCHOOL_NAME')],
                ]
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?=
            Form::widget([
                'model' => $model,
                'form' => $form,
                'columns' => 2,
                'attributes' => [
                    'firstname' => ['type' => Form::INPUT_TEXT, 'options' => ['maxlength' => 60,
                            'placeholder' => 'ป้อนชื่อผู้ลงทะเบียน เช่น นายสหกรณ์'],'label'=>Yii::t('acad','FIRSTNAME')],
                    'lastname' => ['type' => Form::INPUT_TEXT, 'options' => ['maxlength' => 60,
                            'placeholder' => 'ป้อนนามสกุลผู้ลงทะเบียน เช่น สกุลดี'],'label'=>Yii::t('acad','LASTNAME')],
                    'position' => ['type' => Form::INPUT_TEXT, 'options' => ['maxlength' => 100,
                            'placeholder' => 'ตำแหน่งงาน'],'label'=>Yii::t('acad','POSITION')],
                    'phone'     => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 10,
                            'placeholder' => 'ป้อนเฉพาะตัวเลขอย่างน้อย 9 หลักและไม่เกิน 10 หลัก โดยไม่ต้องใส่เครื่องหมาย - หรือช่องว่าง'],'label'=>Yii::t('acad','PHONE')],
//                    'phone' => [
//                        'type' => Form::INPUT_WIDGET,
//                        'widgetClass' => yii\widgets\MaskedInput::className(),
//                        'options' => ['name' => 'phone','mask' =>'9', 'clientOptions' => ['repeat'=>10,'greedy' => false, 'maxlength' => 12, 'class' => 'form-control']],
//                    ],
                    'email' => ['type' => Form::INPUT_TEXT, 'options' => ['maxlength' => 100,
                            'placeholder' => 'ตัวอย่าง maesot@kprums.org'],'label'=>Yii::t('acad','EMAIL')],
                    'actions' => [
                        'type' => Form::INPUT_RAW,
                        'value' => '<div style="text-align: right; margin-top: 25px" class="form-group pull-left">' .
                        Html::resetButton('ล้างค่า', ['class' => 'btn btn-default']) . ' ' .
                        Html::submitButton($model->isNewRecord ? 'ลงทะเบียน' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) .
//                        Html::button('เพิ่ม',
//                            ['type' => 'button', 'class' => 'btn btn-primary ']).
                        '</div>'
                    ],
                ]
            ])
            ?>
        </div>
    </div>

    <!--<div class="form-group">-->
<?php
//Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
//  ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
?>
    <!--</div>-->

<?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
