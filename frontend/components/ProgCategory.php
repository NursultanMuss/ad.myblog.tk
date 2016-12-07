<?php
/**
 * Created by PhpStorm.
 * User: Nursultan
 * Date: 03.11.2016
 * Time: 11:13
 */
namespace frontend\components;

use yii\base\widget;
use yii\helpers\Html;
use frontend\models\Programming;
use Yii;

class ProgCategory extends Widget{
    public function run(){
        $posts = Programming::find()->where(['hide' => 0])->all();
        $categories=[];
        foreach ($posts as $post){
            $categories[$post->category]=0;
        }
        foreach ($posts as $post){
            foreach ($categories as $key =>$value){
                if($key==$post->category){
                    $categories[$key]=++$value;
                };
            }
        }
        $a1='';
        foreach ($categories as $category => $amount){
            $a=Html::tag('a', $category, ['href' => Yii::$app->urlManager->createUrl(['site/prog_category','category' => $category])]);
            $a1.=$a;
        }

        return Html::tag('div', $a1, ['class' => 'categories']);
    }


}