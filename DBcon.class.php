<?php 
 $serverName="127.0.0.1" ;
     $UserName="root" ;
    $Password="" ;
    $DBName="php_finalproject" ;
    try{
$con=new mysqli( $serverName,$UserName,$Password,$DBName);

    }catch(PDOException $ec){
        $ec->getMessage();

    }


include_once 'User.class.php';

$user=new user($con);


?>