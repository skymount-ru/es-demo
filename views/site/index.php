<?php

/* @var $this yii\web\View */
/* @var DataProviderInterface $actorsDP */

use yii\data\DataProviderInterface;
use yii\widgets\ListView;

$this->title = 'Testing PostgreSQL';
?>
<section>
    <h2>Actors</h2>
    <?= ListView::widget([
        'dataProvider' => $actorsDP,
        'itemView' => '_actor-card',
        'layout' => '{items}{pager}',
        'options' => [
            'class' => ['grid-bordered row'],
        ],
        'itemOptions' => [
            'class' => ['grid-cell col-md-4'],
        ],
    ]) ?>
</section>