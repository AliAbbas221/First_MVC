<?php
namespace App\controller;
require_once 'baseController.php';
require_once __DIR__.'/../models/courses.php';
require_once __DIR__.'/../models/order.php';
use APP\basecontroller;
use App\Model\course as cou;
use App\Model\order;
class orderContrroller extends basecontroller{
//    public function index(){
    public function buy($id){
          // if($_SERVER['REQUEST_METHOD']==='POST'){

           
                
               
               $order1=new order();
               $order1->setcid($id);
        $order1->setuid($_SESSION['id']);
       $order1->saveorder($this->conn);
      header('Location:/darrebni5/');
           
            }
            
            public function ss(){
                echo 'good';
            }
          }












// public function buy(){
//     if($_SERVER['REQUEST_METHOD']==='POST'){
//         $id=$_GET['id'];
//        $reslut=course:: getcoursebyid($this->conn,$id);

//     }
//     else{
//         $this->render('users/buy');
//     }
//   }