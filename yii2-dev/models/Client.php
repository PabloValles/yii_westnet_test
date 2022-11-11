<?php

namespace app\models;

use Yii;

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
            [['name', 'document', 'isActive', 'category_id', 'createdAt'], 'required'],
            [['document', 'isActive', 'category_id'], 'integer'],
            [['createdAt'], 'safe'],
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
}
