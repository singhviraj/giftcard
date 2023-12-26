<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Balance $model */

$this->title = 'Update Balance: ' . $model->customer_number;
$this->params['breadcrumbs'][] = ['label' => 'Balances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_number, 'url' => ['view', 'customer_number' => $model->customer_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="balance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
