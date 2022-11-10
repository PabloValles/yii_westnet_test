<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Paises</h1>
      <ul>
      <?php foreach ($countries as $country): ?>

        <li>
          <?= Html::encode("{$country->name} {$country->code}") ?>
          <?= $country->population ?>
        </li>

      <?php  endforeach; ?>

      </ul>

      <?= LinkPager::widget(['pagination' => $pagination]) ?>


    </div>
  </div>
</div>