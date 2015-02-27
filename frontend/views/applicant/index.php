<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Applicants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applicant-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'hover'        => true,
        'pjax'         => true,
        
        'columns'      => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'header' => 'ที่',
            ],
//            'id',
            [
                'attribute' => 'school_name',
                'headerOptions' => ['style'=>'text-align: center;'],

            ],
            
            [
                'class' => '\kartik\grid\DataColumn',
                'attribute' => 'firstname',
//                'value' => function($model) {
//                    return $model->firstname . "  " . $model->lastname;
//                },
                'headerOptions' => ['style'=>'text-align: center;'],
//                'filterType' => GridView::FILTER_TYPEAHEAD,
                
            ],
            [
                'attribute' => 'lastname',
                'headerOptions' => ['style'=>'text-align: center;'],

            ],
            
            [
                'attribute' => 'position',
                'headerOptions' => ['style'=>'text-align: center;'],

            ],
            [
                'attribute' => 'phone',
                'headerOptions' => ['style'=>'text-align: center;'],

            ],
            [
                'attribute' => 'email',
                'headerOptions' => ['style'=>'text-align: center;'],

            ],
//            'firstname',
//            'lastname',
//            'school_name',
//            'position',
//            'phone',
//            'email:email',
//            'created_at',
//            'updated_at',
            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'export'       => false,
    ]);
    ?>

    <?php Pjax::end() ?>

</div>
