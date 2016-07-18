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
        $this->view->setVar("title","首页");
    }
    public function registerAction(){
        echo "register";

    }
}