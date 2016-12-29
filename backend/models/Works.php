<?php

namespace backend\models;

use Yii;

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
            [['address', 'description', 'img', 'type', 'active', 'date', 'client', 'details', 'technology', 'testimonial'], 'required'],
            [['active', 'date'], 'integer'],
            [['testimonial'], 'string'],
            [['address', 'description', 'img'], 'string', 'max' => 255],
            [['type', 'client', 'details', 'technology'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'address' => Yii::t('app', 'Address'),
            'description' => Yii::t('app', 'Description'),
            'img' => Yii::t('app', 'Img'),
            'type' => Yii::t('app', 'Type'),
            'active' => Yii::t('app', 'Active'),
            'date' => Yii::t('app', 'Date'),
            'client' => Yii::t('app', 'Client'),
            'details' => Yii::t('app', 'Details'),
            'technology' => Yii::t('app', 'Technology'),
            'testimonial' => Yii::t('app', 'Testimonial'),
        ];
    }
    public $link;
    public function afterFind() {
//        $this->date = date('j', $this->date).date('.n', $this->date).date('. Y', $this->date);
        if($this->id == 1){
            $this->img = '/img/works/' . $this->img;
        }else{
            $this->img = '/img/works/' . $this->img . ".jpg";
        }
        $this->link = Yii::$app->urlManager->createUrl(["works/update", "id" => $this->id]);
    }
}
