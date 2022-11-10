<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\filters\AccessController; // para que se puedan manejar los controladores
use yii\web\Controller; // Nos sirve para manipular la vista y el controlador

use app\models\TestForm;
use app\models\Country;


class TestController extends Controller
{
  public function actionIndex()
  {
    $model = new TestForm;

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
      
      $isActive = ($model->isActive == 1) ? "Activo" : "Inactivo";
      
      $respuesta = "Cliente: $model->name DNI: $model->document | $isActive";

      return $this->render('index', ['msg'=>$respuesta, 'model' => $model]);


    }

    return $this->render('index', ['msg'=>"", 'model' => $model]);

    
  }

  public function actionCountries(){

    $query = Country::find();

    $pagination = new Pagination([
      'defaultPageSize' => 5,
      'totalCount' => $query->count(),
    ]);

    $countries = $query->orderBy('name')
      ->offset($pagination->offset)
      ->limit($pagination->limit)
      ->all();

    return $this->render('countries', [
      'countries' => $countries,
      'pagination' => $pagination,
    ]);

  }
}
?>
