<?php
/**
 * Created by PhpStorm.
 * User: HomeO
 * Date: 22.10.2016
 * Time: 14:57
 */
namespace frontend\models;

use yii\db\ActiveRecord;
use Yii;

class Programming extends ActiveRecord{
    
    public $link;
    public $video;
    public $number;
    public function afterFind() {
        $monthes = [
            1 => 'Января', 2=> 'Февраля', 3 => 'Марта', 4 => 'Апреля', 5 => 'Мая', 6 => 'Июня',
            7 => 'Июля', 8 => 'Августа', 9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        ];

        $this->date_of_publication = date('j ', $this->date_of_publication).$monthes[date('n', $this->date_of_publication)].date(', Y', $this->date_of_publication);


        $this->link = Yii::$app->urlManager->createUrl(["site/prog_post", "id" => $this->id]);

    }
    
}