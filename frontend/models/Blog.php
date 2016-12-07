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
       // $this->full_text = $this->replaceContent($this->full_text);
        //$this->intro_text = $this->replaceContent($this->intro_text);


        $this->link = Yii::$app->urlManager->createUrl(["site/blog_post", "id" => $this->id]);
        //$this->video = $this->youtube("{youtube:".$this->video.",480,295}");
    }
/*
    public function replaceContent ($text){
        $text = $this->youtube($text);
        return $text;
    }
*/
    /*
    private function youtube($text){
        if (strpos($text, "youtube") === false) return $text;
        $reg = "/{youtube:([\w-_]*)?,(\d*)?,(\d*)?}/i";

        $text=preg_replace($reg, str_replace(array("%name%", "%width%", "%height%"), array("\\1", "\\2", "\\3"), file_get_contents(Yii::$app->basePath.Yii::$app->params["dir_tmpl"]."youtube.tpl")), $text);

        return $text;
    }
     * 
     */

    public static function setNumbers($posts){
        $all_releases= Blog::find()->where(['hide' => 0])->orderBy("date")->all();
        $number =1;
        foreach($all_releases as $release){
            foreach ($posts as $post){
                if($post->id == $release->id) $post->number = $number;
            }
            $number++;
        }
    }

}

