<?php
/**
 * Created by PhpStorm.
 * User: RandolfJay
 * Date: 16/7/7
 * Time: 上午8:25
 */
use Exception;
use Phalcon\Loader;//使用路由模块
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Config\Adapter\Ini as ConfigIni;

define('APP_PATH', realpath('..') . '/');
require_once "../vendor/autoload.php";

try{

    //0.Read the configuration 读取配置文件
    $config = new ConfigIni(APP_PATH . 'app/config/config.ini');

    //1.自动加载项目文件
    $loader = new Loader();
    $loader->registerDirs(
        array(
        '../app/controllers/',
        '../app/models/'
        )
    )->register();

    //2. Create a DI 创造一个注入工具
    $di = new FactoryDefault();

    //3. Setup the view component 设置视图组件,并添加到视图中
    $di->set('view',function(){
        $view = new View();
        $view->setViewsDir("../app/views");
        return $view;
    });

    //4. Setup a base URI so that all generated URIs include the "tutorial" folder
    //设置一个根目录
    $di->set('url',function(){
        $url = new UrlProvider();
        $url->setBasePath("/");
        return  $url;
    });

    //5.Setup the database service 设置一个数据库服务
    $di->set('db',function(){
       return new DbAdapter(array(
           'host'=>'127.0.0.1',
           'username'=>'root',
           'password'=>'dh977094',
           'dbname'=>'myblog'
       ));
    });

    // Handle the request
    $application = new Application($di);

    //将Debugger加载到服务中
    $di['app'] = $application; //将应用实例保存到$di的app服务中
    $provider = new Snowair\Debugbar\ServiceProvider('../app/config/debugbar.php');
    $provider -> register();//注册
    $provider -> boot(); //启动

    echo $application->handle()->getContent();

}catch(Exception $e){

    echo "PhalconException: ", $e->getMessage();
}