<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 31.10.2016
 * Time: 20:23
 */

namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

class Blog extends ActiveRecord{
    public $number;
    public $link;
    public $video;

    public function afterFind()
    {
        $monthes = [
            1 => 'Января', 2=> 'Февраля', 3 => 'Марта', 4 => 'Апреля', 5 => 'Мая', 6 => 'Июня',
            7 => 'Июля', 8 => 'Августа', 9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        ];

        $this->date = date('j ', $this->date).$monthes[date('n', $this->date)].date(', Y', $this->date);
        $this->img = '/img/blog/' . $this->img;
        $this->link = Yii::$app->urlManager->createUrl(["site/blog_post", "id" => $this->id]);
    }



}

