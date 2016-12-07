<?php
/**
 * Created by PhpStorm.
 * User: Nursultan
 * Date: 03.11.2016
 * Time: 11:32
 */
namespace frontend\components; 
 
 
use yii\base\widget;
use yii\helpers\Html;
use frontend\models\Blog;
use Yii;


class BlogCategory extends Widget{
    public function run(){
        $posts = Blog::find()->where(['hide' => 0])->all();
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
        foreach ($categories as $category => $amount){

        }
        $title="";
        $a1='';
        foreach ($categories as $category => $amount){
            if ($amount == 1 ){
                $title = $amount." запись";
            }else {
                $title = $amount . ' записи';
            }
            $a=Html::tag('a', $category, [
                'href' => Yii::$app->urlManager->createUrl(['site/blog_category','category' => $category]),
                'title' => $title
            ]);
            $a1.=$a;
        }

        return Html::tag('div', $a1, ['class' => 'categories']);
    }

}