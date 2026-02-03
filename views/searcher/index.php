<?php

use app\models\Searcher;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SearcherSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Поисковики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="searcher-index">



    <p>
        <?= Html::a('Добавить поисковика', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            [
                'attribute' => 'created_at',
                'format' => ['datetime', 'php:d.m.Y H:i'],

            ],

            [
                'attribute' => 'name',
                'content' => function(Searcher $model) {

                    $content[] =  Html::tag('p',$model->name);
                    $content[] =  Html::tag('span',$model->call, ['class' => 'text-muted']);
                    return implode("\n", $content);
                }
            ],
            [
                'label' => 'Контакты',
                'headerOptions' => ['width' => '150'],
                'content' => function(Searcher $model) {

                    $content[] =  Html::a($model->tg, "https://t.me/".$model->tg, ['target' => '_blank']);
                    $content[] =  '<br>'  ;
                    $content[] =  Yii::$app->formatter->format($model->phone, 'phone')  ;
                    return implode("\n", $content);
                }
            ],
            [
                'label' => 'Авто',
                'headerOptions' => ['width' => '150'],
                'content' => function(Searcher $model) {
                    if ($model->hasCar())
                    {
                        return $model->auto_number;
                    }
                    return 'Пеший';

                }
            ],
            [
                'label' => 'Адрес',
                     'content' => function(Searcher $model) {
                    $content[] =  Html::tag('p',$model->address);
                    $content[] =  Html::tag('span',$model->coordinate, ['class' => 'text-muted']);

                    return implode("\n", $content);

                }
            ],
            [
                'attribute' => 'spg',
                'content' => function(Searcher $model) {
                    if ($model->isSPG()) {
                        return 'СПГ';
                    }
                    return '-';

                }
            ],
            [
                'attribute' => 'sg',
                'content' => function(Searcher $model) {
                    if ($model->isSG()) {
                        return 'СГ';
                    }
                    return '-';

                }
            ],

            'equipment:ntext',
            [
                'label' => 'Готов выезжать',
                'content' => function(Searcher $model) {
                    $content = [];
                    if ($model->isForest())
                    {
                        $content[] =   Html::tag('p','Лес');
                    }
                    if ($model->isUrban())
                    {
                        $content[] =   Html::tag('p','Город');
                    }

                    return implode("\n", $content);

                }
            ],
            [
                'label' => 'Курс первой помощи',
                'content' => function(Searcher $model) {
                    $content = [];
                    if ($model->isMedicine()) {
                        if ($model->isMdeicineBase()) {
                            $content[] = Html::tag('p','Базовый');
                        }
                        if ($model->isMdeicineSpec()) {
                            $content[] = Html::tag('p','Специальный');
                        }
                    } else {
                        $content[] = 'Не проходил';
                    }

                    return implode("\n", $content);

                }
            ],


            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => function ($action, Searcher $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
