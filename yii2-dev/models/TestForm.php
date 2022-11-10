<?php

namespace app\models;

use yii\base\Model;

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
    ];
  }

}
