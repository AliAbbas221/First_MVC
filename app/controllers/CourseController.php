<?php
namespace App\controller;
require_once 'baseController.php';
require_once __DIR__.'/../models/courses.php';
use APP\basecontroller;
use App\Model\course as cou;
class courseContrroller extends basecontroller{
//    public function index(){
   
// }
public function index(){
    if(isset($_SESSION['name'])&& $_SESSION['type']=='admin'){
        $courses= cou::getallcourses($this->conn);
   require 'views/courses/indexcourse.php';
       
      
    }
    else{
      header('Location:'.BASEPATH.'signUp');
    }
 
  
   //echo 'sefg'. var_dump($users);
  }
  //edit course function 
  public function edit($id){
    // //  echo $id.'edit';
    if($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['name'])){echo 'rr';
      $result=cou::getcoursebyid($this->conn,$id);
      $result->setname($_POST['name']);
      $result->setprice($_POST['price']);
      $result->savecourse($this->conn);
      header('Location:'.BASEPATH.'Admin');
   
     }
    else{
      $results= cou::getcoursebyid($this->conn,$id);
     
      require 'views/courses/edit.php';
    }}
   //$this->render('courses/edit',compact('result'));

  
  
  
  public function addcourse(){
    //var_dump($_SERVER['REQUEST_METHOD']);
    if($_SERVER['REQUEST_METHOD']==='POST'  && isset($_POST['name']) && isset($_POST['price'])){
      
          $c1=new cou();
          $c1->setname($_POST['name']);
          $c1->setprice($_POST['price']);
          $c1->savecourse($this->conn);
          header('Location:'.BASEPATH.'Admin');
    }
  else{  require 'views\courses\addcourse.php'; 
     // $this->render('courses/addcourse');
    }
  }
  public function deletecourse($id){
    $v2=new cou();
       $rr= $v2->deltecourses($this->conn,$id);
      header('Location:'.BASEPATH.'Admin');
  }

}
?>