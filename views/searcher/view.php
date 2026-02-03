<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Searcher $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Searchers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="searcher-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'name',
            'tg',
            'call',
            'phone',
            'auto_number',
            'address',
            'coordinate',
            'spg',
            'sg',
            'equipment:ntext',
            'target_urban',
            'target_forest',
            'medicine_base',
            'medicine_spec',
        ],
    ]) ?>

</div>
