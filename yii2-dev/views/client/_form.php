<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Category;

/** @var yii\web\View $this */
/** @var app\models\Client $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="client-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label("Nombre") ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'document')->textInput()->label("Documento") ?>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-3">
            <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'))->label("Categoría") ?>    
        </div>
    </div>
    
    <?php //echo $form->field($model, 'createdAt')->textInput(["readonly"=>true, "value"=>date("Y-m-d h:m:s"), "type"=>'hidden'])->label(false) ?>

    <?php //echo $form->field($model, 'modifiedAt')->textInput(["readonly"=>true, "value"=>date("Y-m-d h:m:s"), "type"=>'hidden'])->label(false) ?>
    <br>

    <?= $form->field($model, 'isActive')->checkbox([
        'label' => Yii::t('app', 'Cliente activo?')
        ]); ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
