<?php
declare (strict_types=1);
namespace App\Models;
use PDO;
//include ('database.php');
require 'config/database.php';
use mysqli;
session_start();
abstract class Model{
    protected $id;
   public function getId(){
    return $this->id;
   }
   public function setid($d){
    $this->id=$d;
   }
   public static  function getall($db,$tablename){
    $result="SELECT * FROM $tablename";
    $s=$db->prepare($result);
    $s->execute();
    $at=array();
     $at=$s->fetchAll(PDO::FETCH_ASSOC);

    
    return $at;

   }
//    abstract static function getuserbyid($con,$id);
//    abstract function save($con);
}
class User extends Model{

    protected $name;
    protected $email;
    protected $password;
    public function  getname(){
        return $this->name;
    }
    public function getemail(){
        return $this->email;
    }
    public function  setpassword($p){
        $this->password=$p;
    }
    public function getpassword(){
        return $this->password;
    }
    public function setname(String $n){
        $this->name=$n;
    }
    public function setemail( String $e){
$this->email=$e;
    }
    public static function getuserbyid($db,$id){
        
        $query="SELECT * FROM users WHERE id='$id'";
       // $s=mysqli_query($con,$query);
       $s=$db->prepare($query);
       $s->execute();
        $result=$s->fetchAll(PDO::FETCH_ASSOC);
        $user =new User();
        $user->id=$result['id'];
        $user->name=$result['name'];
        $user->email=$result['email'];
        $user->password=$result['password'];
        return $user;
        
        

    }
    public static function getallusers($con){
        $quryy="SELECT * FROM users";
        $result=mysqli_query($con,$quryy);
        $users = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User();
            $user->setid( $row['id']);
            $user->setname($row['name']);
            $user->setemail($row['email']);
            $user->setpassword($row['password']);
            $users[] = $user;
        }
        
        return $users;
        

    }
    public static function testuser($db,$email,$password){
      $er="SELECT * FROM users WHERE email='$email' AND password='$password'";
      //$s=mysqli_query($con,$er);
     $s= $db->prepare($er);
     $s->execute();
      
        
     if ($s->rowCount() > 0) {
        $row = $s->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
      else{
       $s=0;
      }
     
    
    }   
    public  function save($con){
    if($this->id){
        $q2="UPDATE users SET name='$this->name',email='$this->email',password='$this->password' WHERE id='$this->id'";
        $s=$con->prepare($q2);
        $s->execute();
    }
    else{
        $q22="INSERT INTO users (name,email,password) VALUES('$this->name','$this->email','$this->password')";
        $s=$con->prepare($q22);
        $s->execute();
        $this->id=$con->lastInsertId();
        
    }
    }
}
?>