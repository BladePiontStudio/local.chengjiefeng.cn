<?php
/**
 * Created by PhpStorm.
 * User: RandolfJay
 * Date: 16/6/23
 * Time: 下午6:29
 */

namespace Home\Controller;
use Think\Controller;

class AboutController extends Controller
{
    public function me(){
        $this->display();
    }

    public function contact(){
        $this->display();
    }
}