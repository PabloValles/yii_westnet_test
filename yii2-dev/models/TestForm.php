<?php

namespace app\models;
use yii\base\Model;

use app\models\Client;

class Testform extends Model
{

  public $name, $document;
  public $isActive;
  public $createdAt;

  
  public function rules()
  {
    return [
      [['name', 'document', 'isActive'], 'required'],
      ['document', 'number'],
      ['document', 'document_exist'],
    ];
  }

  public function document_exist($attribute, $params){

    $customers = Client::find()->all();
    foreach ($customers as $dni) {

        if($this->document == $dni->document){
            $this->addError($attribute, "El documento seleccionado ya existe!");
            return true;
        }
        
    }
  }

}
