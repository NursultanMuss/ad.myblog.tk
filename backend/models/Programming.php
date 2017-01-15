<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%programming}}".
 *
 * @property string $id
 * @property string $resource
 * @property string $res_link
 * @property string $title
 * @property string $entry_image
 * @property string $category
 * @property string $date_of_publication
 * @property string $full_text
 * @property string $meta_desc
 * @property string $meta_key
 * @property integer $hits
 * @property integer $hide
 */
class Programming extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%programming}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resource', 'res_link', 'title', 'entry_image', 'category', 'date_of_publication', 'full_text', 'meta_desc', 'meta_key', 'hits', 'hide'], 'required'],
            [['entry_image', 'full_text'], 'string'],
            [['date_of_publication'], 'safe'],
            [['hits', 'hide'], 'integer'],
            [['resource', 'res_link', 'title', 'category', 'meta_desc', 'meta_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'resource' => Yii::t('app', 'Ресурс'),
            'res_link' => Yii::t('app', 'Ссылка'),
            'title' => Yii::t('app', 'Заголовок'),
            'entry_image' => Yii::t('app', 'Фото статьи'),
            'category' => Yii::t('app', 'Категория'),
            'date_of_publication' => Yii::t('app', 'Опубликованно'),
            'full_text' => Yii::t('app', 'Весь текст'),
            'meta_desc' => Yii::t('app', 'Meta Description'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'hits' => Yii::t('app', 'Hits'),
            'hide' => Yii::t('app', 'Hide'),
        ];
    }
}
