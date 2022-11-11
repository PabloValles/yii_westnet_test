<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

use yii\db\Expression;


/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property int $document
 * @property int $isActive
 * @property int $category_id
 * @property string $createdAt
 * @property string $modifiedAt
 *
 * @property Category $category
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    
    public function behaviors()
    {   
        return [
            'datestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['createdAt', 'modifiedAt'],
                ],
                'value' => function(){
                    return date('Y-m-d H:i:s');
                }
            ],
            'updatestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['modifiedAt'],
                ],
                'value' => function(){
                    return date('Y-m-d H:i:s');
                }
            ]
        ];
    }
     public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'document', 'isActive', 'category_id'], 'required'],
            [['document', 'isActive', 'category_id'], 'integer'],
            [['createdAt'], 'safe'],
            [['modifiedAt'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'document' => 'Document',
            'isActive' => 'Is Active',
            'category_id' => 'Category ID',
            'createdAt' => 'Created At',
            'modifiedAt' => 'Modified At',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function beforeSave($insert)
    {
        //var_dump($this);
        

        if ($this->isNewRecord) {
            // Code ..
        }

        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {

        return parent::afterSave($insert, $changedAttributes);
    }
}
