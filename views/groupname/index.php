<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Groupnames';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="groupname-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Groupname', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'group_id',
            'group_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
