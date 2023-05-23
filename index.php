<?php
require_once __DIR__.'/app/controllers/BaseController.php';
require_once __DIR__.'/app/controllers/UserController.php';
require_once __DIR__.'/app/controllers/orderController.php';
require_once __DIR__.'/app/controllers/CourseController.php';
use App\controller\UserController;
use App\controller\courseContrroller;
use App\controller\orderContrroller;
USE App\Models\User;
use App\Model\course;
require 'config/database.php';
define('BASEPATH','/darrebni5/');



//$db=mysqli_connect($ff['host'],$ff['username'],$ff['password'],$ff['database']);
// if (!$pdo) {
//     die('Connection failed: ' . mysqli_connect_error());
// }
$action=$_SERVER['REQUEST_URI'];
switch($action){
    case BASEPATH:
        $controller=new UserController($db);
        $controller->index();
         break;
    case BASEPATH.'user':
        $controller=new UserController($db);
        $controller->index();
         break;
    case BASEPATH.'BB':
        $controller=new courseContrroller($db);
        break;
    case BASEPATH.'signUp':
        $controller1=new UserController($db);//BASEPATH.'views/users/login.php
        $controller1->signup();
        break;
    case BASEPATH.'login':
       $controller2=new UserController($db);
       $controller2->login();
         break;
    case BASEPATH.'Admin':
        $controller4=new courseContrroller ($db);
        $controller4->index();
        break;
    case BASEPATH.'ADDCOUSRE':
        $controller5=new courseContrroller($db);
        $controller5->addcourse();
        break;
        //
            //
    case (strpos($_SERVER['REQUEST_URI'], BASEPATH . 'Editcourse/') === 0):
        $id = substr($_SERVER['REQUEST_URI'], strlen(BASEPATH . 'Editcourse/'));
            $controller6=new courseContrroller($db);
            $controller6->edit($id);
            break;
       
    case  (strpos($_SERVER['REQUEST_URI'], BASEPATH . 'buycourse/') === 0):
        $id = substr($_SERVER['REQUEST_URI'], strlen(BASEPATH . 'buycourse/'));  
        $controller9=new  orderContrroller($db);
         $controller9->buy($id);
         break;
    case (strpos($_SERVER['REQUEST_URI'], BASEPATH.'Deletecourse/')===0):
        $id=substr($_SERVER['REQUEST_URI'],strlen(BASEPATH.'Deletecourse/'));
        $controller22=new courseContrroller($db);
        $controller22->deletecourse($id);
        break;

    default:
    $controller=new UserController($db);
        $controller->index();
        break;
    
}

?>