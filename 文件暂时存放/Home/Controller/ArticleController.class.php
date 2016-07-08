<?php
/**
 * Created by PhpStorm.
 * User: RandolfJay
 * Date: 16/6/23
 * Time: 下午6:12
 */
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
        $this->display();
    }
}