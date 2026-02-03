<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Searcher $model */

$this->title = 'Успешно';

\yii\web\YiiAsset::register($this);
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Спасибо</h1>
        <p class="lead"><strong> <?=$model->name?></strong>, вы успешно записались!</p>

        <p class="lead"><?=Html::a('На главную', '/')?></p>
    </div>

</div>
