<?php
/**
 * Created by PhpStorm.
 * User: RandolfJay
 * Date: 16/7/7
 * Time: 下午2:58
 */

use Phalcon\Mvc\Controller;


class SignupController  extends Controller
{
    public function indexAction(){

    }

    public function registerAction(){
        $user = new Users();
        $success = $user->save($this->request->getPost(),array('name','email'));
        if($success){
            echo "Thanks for registering!";
        }else{
            echo "Sorry, the following problems were generated: ";
            foreach($user->getMessages() as $message){
                echo $message->getMessage(), "<br/>";
            }
        }
        $this->view->disable();
    }
}