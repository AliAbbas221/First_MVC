<?php
declare (strict_types=1);
namespace App\Model;
require_once 'user.php';
require 'config/database.php';
use App\Models\Model;
use PDO;

class course extends Model{
    protected $name;
    protected $price;
     public function getname(){
      return $this->name;
     }
     public function getprice(){
      return $this->price;
     }
     public function setname($n){
      $this->name=$n;
  }
  public function setprice($p){
    $this->price=$p;
  }
     public static function getallcourses($db){
   $q="SELECT * FROM courses";
   $s=$db->prepare($q);
   $s->execute();
 
   $result3=array();
   while($result2=$s->fetch(PDO::FETCH_ASSOC)){
    $c=new course();
    $c->setId($result2['id']);
    $c->setname($result2['name']);
    $c->setprice($result2['price']);
    $result3[]=$c;
   }

   
   return $result3;
     } 
     public function savecourse($db){
    if($this->id){
   $result="UPDATE courses SET name='$this->name' , price='$this->price' WHERE id='$this->id'";
     $s=$db->prepare($result);
     $s->execute();
    }
    else{
      $s1="INSERT INTO courses (name,price) VALUES ('$this->name', '$this->price')";
    $result2=$db->prepare($s1);
    $result2->execute();
    $this->id=$db->lastInsertId();
    }
     }
     public static function getcoursebyid($con,$id){
       
      $query="SELECT * FROM courses WHERE id='$id'";
      $s=$con->prepare($query);
      $s->execute();
      $result=$s->fetch(PDO::FETCH_ASSOC);
      
      $course =new course();
      $course->id=$result['id'];
      $course->name=$result['name'];
      $course->price=$result['price'];
      
      return $course;
      }
      public  function  deltecourses($con,$id){
        $query1="DELETE FROM orders WHERE cid='$id'";
        $rr1=$con->prepare($query1);
        $rr1->execute();
        $query2="DELETE FROM courses WHERE id='$id'";
        $rr1=$con->prepare($query2);
        $rr1->execute();
        
      }
      

  }
  





