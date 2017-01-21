<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%works}}".
 *
 * @property string $id
 * @property string $address
 * @property string $description
 * @property string $img
 * @property string $type
 * @property integer $active
 * @property string $date
 * @property string $client
 * @property string $details
 * @property string $technology
 * @property string $testimonial
 */
class Works extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%works}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'description', 'img','type', 'active', 'date', 'client', 'details', 'technology', 'testimonial'], 'required'],
            [['active', 'date'], 'integer'],
            [['testimonial'], 'string'],
            [['address', 'description','img'], 'string', 'max' => 255],
            [['type', 'client', 'details', 'technology'], 'string', 'max' => 60],
            ['file', 'file'],
            [['del_img'], 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', ''),
            'address' => Yii::t('app', 'Ссылка'),
            'description' => Yii::t('app', 'Описание'),
            'img' => Yii::t('app', 'Картинка'),
            'del_img' => Yii::t('app', 'Удалить фото?'),
            'file' => Yii::t('app', 'Logo'),
            'type' => Yii::t('app', 'Type'),
            'active' => Yii::t('app', 'Active'),
            'date' => Yii::t('app', 'Изменено'),
            'client' => Yii::t('app', 'Клиент'),
            'details' => Yii::t('app', 'Details'),
            'technology' => Yii::t('app', 'Technology'),
            'testimonial' => Yii::t('app', 'Testimonial'),

        ];
    }

    public $file;
    public $del_img;

    public $link;
    public function afterFind() {
        $controller = Yii::$app->controller->id;
        if($controller == "site"){
            $this->date = date('j', $this->date).date('.n', $this->date).date('. Y', $this->date);
        }
          $this->img = '/img/works/' . $this->img;
        $this->link = Yii::$app->urlManager->createUrl(["works/update", "id" => $this->id]);
    }
}
