<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<?php
  if ($msg) {

    echo Html::tag('div', Html::encode($msg,), ['class'=>'alert alert-success']);

  }
?>

<div class="row mt-5">
  <div class="col-md-8">
    <h2>Completa la info del cliente</h2>
    <hr>
    <?php $form = ActiveForm::begin(); ?>
      
      <div class="form-group">
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'document') ?>
        <?= $form->field($model, 'isActive')->checkbox([
          'label' => Yii::t('app', 'Cliente activo')
        ]); ?>
      </div>
      <br>
      <div class="form-group">
        <?= Html::submitButton("Enviar", ['class' => 'btn btn-info']) ?>
      </div>

    <?php $form = ActiveForm::end(); ?>
  </div>
</div>
