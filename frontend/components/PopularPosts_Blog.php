<?php
/**
 * Created by PhpStorm.
 * User: Nursultan
 * Date: 02.11.2016
 * Time: 14:32
 */

namespace frontend\components;

use yii\base\widget;
use yii\helpers\Html;
use frontend\models\Blog;


class PopularPosts_Blog extends Widget{
    public $id;

    public function run(){

        $posts = Blog::find()->where(['hide' => 0])->limit(5)->where(['not', ['id' => $this->id]])->orderBy(['hits' => SORT_DESC])->all();

        $li1='';
        foreach($posts as $post){
            $a=Html::tag('a', $post->title, ['href' => $post->link]);
            $li = Html::tag('li',$a);
            $li1.=$li;

        }
        return HTML::tag('ul', $li1, ['id'=> 'popular_post']);
    }

}