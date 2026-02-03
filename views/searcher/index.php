<?php

use app\models\Searcher;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearcherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Searchers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="searcher-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Searcher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'name',
            'tg',
            'call',
            //'phone',
            //'auto_number',
            //'address',
            //'coordinate',
            //'spg',
            //'sg',
            //'equipment:ntext',
            //'target_urban',
            //'target_forest',
            //'medicine_base',
            //'medicine_spec',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Searcher $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
