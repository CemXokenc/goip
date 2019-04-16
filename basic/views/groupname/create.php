<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Groupname */

$this->title = 'Create Groupname';
$this->params['breadcrumbs'][] = ['label' => 'Groupnames', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupname-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
