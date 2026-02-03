<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Searcher $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="searcher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auto_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coordinate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spg')->textInput() ?>

    <?= $form->field($model, 'sg')->textInput() ?>

    <?= $form->field($model, 'equipment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'target_urban')->textInput() ?>

    <?= $form->field($model, 'target_forest')->textInput() ?>

    <?= $form->field($model, 'medicine_base')->textInput() ?>

    <?= $form->field($model, 'medicine_spec')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
