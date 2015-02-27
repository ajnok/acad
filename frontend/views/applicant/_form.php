<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Applicant */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs(
    '$("document").ready(function(){
        $("#new_country").on("pjax:end", function() {
            $.pjax.reload({container:"#countries"});  //Reload GridView
        });
    });'
);
?>

<div class="applicant-form">
    <?php Pjax::begin(['id' => 'new_applicant']) ?>
    <?php
    $form = ActiveForm::begin([
            'options' => ['data-pjax' => true],
            'type'    => ActiveForm::TYPE_VERTICAL,
//            'fieldConfig' => [
//                'template' => '{label}{input}'
//            ]
    ]);
    ?>
    <div class="row" >
        <div class="col-lg-8">
            <?=
            Form::widget([
                'model'      => $model,
                'form'       => $form,
                'columns'    => 3,
                'attributes' => [
                    'school_name' => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 100,
                            'placeholder' => 'ป้อนชื่อโรงเรียน']],
                ]
            ])
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?=
            Form::widget([
                'model'      => $model,
                'form'       => $form,
                'columns'    => 2,
                'attributes' => [
                    'firstname' => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 60,
                            'placeholder' => 'ป้อนชื่อผู้ลงทะเบียน เช่น นายสหกรณ์']],
                    'lastname'  => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 60,
                            'placeholder' => 'ป้อนนามสกุลผู้ลงทะเบียน เช่น สกุลดี']],
                    'position'  => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 100,
                            'placeholder' => 'ตำแหน่งงาน']],
                    'phone'     => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 10,
                            'placeholder' => 'ป้อนชื่อผู้ลงทะเบียน เช่น นายสหกรณ์']],
                    'email'     => ['type'    => Form::INPUT_TEXT, 'options' => ['maxlength'   => 100,
                            'placeholder' => 'ตัวอย่าง maesot@kprums.org']],
                    'actions'   => [
                        'type'  => Form::INPUT_RAW,
                        'value' => '<div style="text-align: right; margin-top: 20px" class="pull-left">'.
                        Html::resetButton('ล้างค่า', ['class' => 'btn btn-default']).' '.
                        Html::submitButton($model->isNewRecord ? 'ลงทะเบียน' : 'แก้ไข',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) .
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
