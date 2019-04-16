<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?php

$phonelist = \app\models\Groupname::find()->all();
$items = \yii\helpers\ArrayHelper::map($phonelist, 'group_name', 'group_name');

?>

<?= $form->field($model, 'phones')->checkboxList($items) ?>

<?= $form->field($model, 'mail')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>