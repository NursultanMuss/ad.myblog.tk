<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property string $id
 * @property string $title
 * @property string $category
 * @property string $img
 * @property string $intro_text
 * @property string $full_text
 * @property string $date
 * @property string $meta_desc
 * @property string $meta_key
 * @property integer $hits
 * @property integer $hide
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%blog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category', 'img', 'intro_text', 'full_text', 'date', 'meta_desc', 'meta_key', 'hits', 'hide'], 'required'],
            [['intro_text', 'full_text'], 'string'],
            [['date', 'hits', 'hide'], 'integer'],
            [['title', 'category', 'img', 'meta_desc', 'meta_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'category' => Yii::t('app', 'Категория'),
            'img' => Yii::t('app', 'Главное фото'),
            'intro_text' => Yii::t('app', 'Начальный текст'),
            'full_text' => Yii::t('app', 'Статья полностью'),
            'date' => Yii::t('app', 'Дата публикации'),
            'meta_desc' => Yii::t('app', 'Meta Description'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'hits' => Yii::t('app', 'Hits'),
            'hide' => Yii::t('app', 'Hide'),
        ];
    }

    public $file;
    public $del_img;

    public function afterFind() {
       $this->img = '/img/blog/' . $this->img;
    }
}
