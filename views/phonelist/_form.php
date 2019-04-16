<?php

use yii\helpers\Html;
use yii\db\Query;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Phonelist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phonelist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?php $phonelist = \app\models\Groupname::find()->all(); ?>
    <?php $items = \yii\helpers\ArrayHelper::map($phonelist, 'group_id', 'group_name'); ?>
    <?= $form->field($model, 'groupid')->textInput()->dropDownList($items) ?>
    <?/*= $form->field($model, 'groupid')->textInput()->checkbox()*/?>


    <?/*= $form->field($model, 'groupid')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
