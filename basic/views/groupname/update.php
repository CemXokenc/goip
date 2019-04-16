<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Groupname */

$this->title = 'Update Groupname: ' . $model->group_id;
$this->params['breadcrumbs'][] = ['label' => 'Groupnames', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_id, 'url' => ['view', 'id' => $model->group_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="groupname-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
