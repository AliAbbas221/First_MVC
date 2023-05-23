<?php
declare (strict_types=1);
namespace App\Model;
require_once 'user.php';

use App\Models\Model;
class order extends Model{
    protected $uid,$cid;
    public function getuid(){
        return $this->uid;
    }
    public function setuid(int $u){ $this->uid=$u;
    }
    public function getcid(){
        return $this->cid;
    }
    public function setcid( int $s){ $this->cid=$s;
    }
    public function saveorder($con){
        if($this->id){
       $result="UPDATE orders SET uid='$this->uid' AND cid='$this->cid'";
         $ss= $con->prepare($result);
         $ss->execute();
        }
        else{
          $s1="INSERT INTO orders(uid,cid) VALUES ('$this->uid' , '$this->cid')";
        $result2=$con->prepare($s1);
        $result2->execute();
        $id=$con->lastInsertId();
        }
         }
    //  public function getcoursesforuser($con,$id){
    //  $result="SELECT name from courses,users,orders WHERE courses.id=orders.cid AND users.id=orders.uid";
    //  }
}