<?php

namespace App\controller;
require_once __DIR__.'/../models/user.php';
require_once 'baseController.php';
require_once 'CourseController.php';

use App\basecontroller as Ba;
use App\Models\User as UR;
use App\Model\course;
use App\controller\courseContrroller as cour;
class UserController extends Ba{
    public function index(){
        if(isset($_SESSION['email'])){
            $courses= course::getallcourses($this->conn);
       require 'views/users/index.php';
            //$this->render('users/index',compact('courses'));
          
        }
        else{
           header('Location:'.BASEPATH.'signUp');
          
        }
      
      
      
      }
        
    
    public function signup(){
        
        if($_SERVER['REQUEST_METHOD']==='POST'){
    $user=new UR();
    if($this->testName($_POST['name'])){
    $this->test($_POST['name']);

    $user->setname($_POST['name']);
    
    $user->setemail($_POST['email']);
    $user->setpassword($_POST['password']);
    $user->save($this->conn);
     header('Location:'.BASEPATH.'login');
     //require'views/user/login.php';
    //$this->render('login');
    exit;
    }else{require    __DIR__.'/../../views/users/Signup.php';}}
    else{
        require    __DIR__.'/../../views/users/Signup.php';
            //$this->render('/users/Signup');
        }
    }
    public function login(){ 
        if($_SERVER['REQUEST_METHOD']==='POST'){
           $email=$_POST['email'];
           $password=$_POST['password'];
           
           $result=UR::testuser($this->conn,$email,$password);
          
           if($result){
                     
                        $_SESSION['email']=$result['email'];
                        $_SESSION['id']=$result['id'];
                        $_SESSION['name']=$result['name'];
                        $_SESSION['type']=$result['type'];
                        if($_SESSION['type']=='admin'){
                            header('Location:'.BASEPATH.'Admin');
                        }
                        else{
                   
                            header('Location:/darrebni5/');}
                            
                            // else{echo 'error'.$result;
                            //     header('Location:?action=signup');
                            // }
                        }}
        else{ require __DIR__.'/../../views/users/login.php';
                    //$this->render('/users/login');
                }

           

        
    }

}
//PUT FOR INDEX ACTION


?>