<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%programming}}".
 *
 * @property integer $id
 * @property integer $is_release
 * @property string $resource
 * @property string $res_link
 * @property string $title
 * @property string $entry_image
 * @property string $category
 * @property string $full_text
 * @property integer $date
 * @property string $meta_desc
 * @property string $meta_key
 * @property integer $hits
 * @property integer $hide
 * @property integer $no_form
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

//    public function behaviors()
//    {
//        return [
//                [
//            'class' => TimestampBehavior::className(),
//            'attributes' => [
//                ActiveRecord::EVENT_BEFORE_INSERT => 'creation_time',
//                ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
//                    ],
//            'value' => function() { return date('U');},
//                ],
//            ];
//    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_release', 'resource', 'res_link', 'title', 'entry_image', 'category', 'full_text', 'date', 'meta_desc', 'meta_key', 'hits', 'hide', 'no_form'], 'required'],
            [['is_release', 'date', 'hits', 'hide', 'no_form'], 'integer'],
            [['entry_image', 'full_text'], 'string'],
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
            'is_release' => Yii::t('app', 'Is Release'),
            'resource' => Yii::t('app', 'Resource'),
            'res_link' => Yii::t('app', 'Res Link'),
            'title' => Yii::t('app', 'Title'),
            'entry_image' => Yii::t('app', 'Entry Image'),
            'category' => Yii::t('app', 'Category'),
            'full_text' => Yii::t('app', 'Full Text'),
            'date' => Yii::t('app', 'Date'),
            'meta_desc' => Yii::t('app', 'Meta Desc'),
            'meta_key' => Yii::t('app', 'Meta Key'),
            'hits' => Yii::t('app', 'Hits'),
            'hide' => Yii::t('app', 'Hide'),
            'no_form' => Yii::t('app', 'No Form'),
        ];
    }
    public $link;
    public function afterFind() {
        $controller = Yii::$app->controller->id;
       if($controller == "site"){
        $this->date = date('j', $this->date).date('.n', $this->date).date('. Y', $this->date);}
        $this->link = Yii::$app->urlManager->createUrl(["programming/update", "id" => $this->id]);
        }
}
