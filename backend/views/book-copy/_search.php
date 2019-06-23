<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BookCopySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-copy-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'bar_code') ?>

    <?= $form->field($model, 'bookseller_id') ?>

    <?= $form->field($model, 'price1') ?>

    <?php // echo $form->field($model, 'price2') ?>

    <?php // echo $form->field($model, 'collection_place_id') ?>

    <?php // echo $form->field($model, 'circulation_type_id') ?>

    <?php // echo $form->field($model, 'call_number_rules_id') ?>

    <?php // echo $form->field($model, 'library_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
