<?php

/**
 * Created by PhpStorm.
 * User: RandolfJay
 * Date: 16/7/7
 * Time: 上午11:00
 */
use Phalcon\Mvc\Controller;
class IndexController   extends Controller
{
    public function indexAction(){
        echo "hello!<br/>";
        echo $this->tag->linkTo("signup","sign Up here !");
    }
    public function registerAction(){
        echo "register";

    }
}