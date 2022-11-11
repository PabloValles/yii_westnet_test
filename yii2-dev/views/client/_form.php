<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;


/** @var yii\web\View $this */
/** @var app\models\Client $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'document')->textInput() ?>

    <?= $form->field($model, 'isActive')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?php echo $form->field($model,'createdAt')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
