<?php
class user{
private $dp;


public function __construct($dpc)
    {
        $this->dp=$dpc;
    }

   

    public function create($userName, $email, $password, $role)
      {
          try {
              $stmt=$this->dp->prepare('INSERT INTO users(useName , useEmail , usePassword ,useRole) 
VALUES(:userName,:useEmail,:usePassword,:useRole)');
              $stmt->bindParam(":userName", $userName);
              $stmt->bindParam(":useEmail", $email);
              $stmt->bindParam(":usePassword", $password);
              $stmt->bindParam(":useRole", $role);
              $stmt->execute();
              return true;
          } catch(PDOException $e) {
              echo $e->getMessage();
              return false;
          }
      }



      public function getuser($name1)
      {
          $stmt=$this->dp->prepare("SELECT * FROM users WHERE useName=:name1 ");
          $stmt->execute(array(":name1"=>$name1));
          $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
          return $userRow;
      }



}

?>