<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%blog}}".
 *
 * @property string $id
 * @property integer $is_release
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
 * @property integer $no_form
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
            [['is_release', 'title', 'category', 'img', 'intro_text', 'full_text', 'date', 'meta_desc', 'meta_key', 'hits', 'hide', 'no_form'], 'required'],
            [['is_release', 'date', 'hits', 'hide', 'no_form'], 'integer'],
            [['intro_text', 'full_text'], 'string'],
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
            'is_release' => Yii::t('app', 'Is Release'),
            'title' => Yii::t('app', 'Title'),
            'category' => Yii::t('app', 'Category'),
            'img' => Yii::t('app', 'Img'),
            'intro_text' => Yii::t('app', 'Intro Text'),
            'full_text' => Yii::t('app', 'Full Text'),
            'date' => Yii::t('app', 'Date'),
            'meta_desc' => Yii::t('app', 'Meta Desc'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'hits' => Yii::t('app', 'Hits'),
            'hide' => Yii::t('app', 'Hide'),
            'no_form' => Yii::t('app', 'No Form'),
        ];
    }
    public function afterFind() {
        $this->date = date('j', $this->date).date('.n', $this->date).date('. Y', $this->date);
    }
}
