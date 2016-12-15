<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace frontend\components;

use yii\web\UrlRule;

use frontend\models\Sef;

class SefRule extends UrlRule{
    public $connectionID = 'id';
    
    public function init()
    {
        if($this->name === null) $this->name=__CLASS__;
    }
    
    public function createUrl($manager, $route, $params){
        if($route == "site/index") return "";
        if($route == "site/search") return "search.html?q=".$params["q"];
        $link = $route;
        if (count($params)){
            $link .= "?";
            foreach ($params as $key => $value) $link .= "$key=$value&";
            $link = substr($link, 0, -1);
        }
        $sef = Sef::find()->where (["link" => $link])->one();
        if ($sef) return $sef->link_sef.".html";
        return false;
        }
        
        public function parseRequest ($manager, $request)
        {
            
        }
}