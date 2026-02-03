<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Searcher $model */

$this->title = 'Запись в ГБР';


?>

<div class="card">
    <div class="card-header">
        <h2 class="text-center"><?=$this->title?></h2>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="card-body">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tg')->textInput(['maxlength' => true, 'placeholder' => '@ваш_ник']) ?>

        <?= $form->field($model, 'call')->textInput(['maxlength' => true, 'placeholder' => 'Позывной (если нет, оставляем пустым)']) ?>


        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '7(999)999-99-99',
        ]) ?>

        <?= $form->field($model, 'auto_number')->textInput(['maxlength' => true, 'placeholder' => 'Если пеший, не заполняем'])
            ->hint('Если пеший, не заполняем') ?>


        <?= $form->field($model, 'address')->textInput(['maxlength' => true])
            ->hint('Адрес в формате: г.Уфа, улица Ленина, дом 1') ?>

        <?= $form->field($model, 'coordinate')->textInput(['maxlength' => true, 'placeholder' => '54.48726 53.45081'])
            ->hint('В формате 54.48726 53.45081 (можно оставить пустым)') ?>


        <?= $form->field($model, 'spg')->checkbox() ?>

        <?= $form->field($model, 'sg')->checkbox() ?>


        <h4>Готов выезжать</h4>
        <?= $form->field($model, 'target_urban')->checkbox() ?>

        <?= $form->field($model, 'target_forest')->checkbox() ?>



        <h4>Оборудование</h4>
        <?= $form->field($model, 'equipment_list')->checkboxList(
                \yii\helpers\ArrayHelper::map(\app\models\handler\Equipment::findAll(), 'name', 'name')
        )->label('') ?>


        <h4>Проходили ли вы курс первой помощи</h4>
        <?= $form->field($model, 'medicine_base')->checkbox() ?>

        <?= $form->field($model, 'medicine_spec')->checkbox() ?>

        <p class="text-muted">Если не проходили, не отмечаем</p>

    </div>

    <div class="card-footer">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
