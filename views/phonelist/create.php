<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Phonelist */

$this->title = 'Create Phonelist';
$this->params['breadcrumbs'][] = ['label' => 'Phonelists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phonelist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
