<?php  
include_once 'DBcon.class.php';

define('REQUIRED_FIELD_ERROR','هذا الحقل مطلوب');
$test=false;

if(isset($_POST['btn-svae'])) {

    $useName=post_data('UserName');
    $useEmail=post_data('email');
    $usePassword=post_data('password');
    $useRole=post_data('role');

    if(!$useName) {
        $errors['UserName']=REQUIRED_FIELD_ERROR;
    } else {
        $test=true;
    }
    if(!$useEmail) {
        $errors['email']=REQUIRED_FIELD_ERROR;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']='Please enter valid email address';
        $test=false;
    } else {
        $test=true;
    }


    if(!$usePassword) {
        $errors['passwrod']=REQUIRED_FIELD_ERROR;
        $test=false;
    } else {
        $test=true;
    }

    if(!$useRole) {
        $errors['role']=REQUIRED_FIELD_ERROR;
        $test=false;
    } else {
        $test=true;
    }


    if($test){
    if($user->create($useName, $useEmail, $usePassword, $useRole)) {
        session_start();
        $_SESSION['userName']=$useName;

        header("Location:manageUser.php");
    } else {
        header("Location:register.php");
    }
}
}



function post_data($field){
    if(!isset($_POST[$field])){
    return false;
    }
    $data=$_POST[$field];
    return htmlspecialchars(stripslashes(trim($data)));
    }


?>


<?php include_once 'includ/head.php';   ?>



<div class="container">
    
<form  method="post" >
 
<label  class="form-label ">User Name</label>
<input type="text" name="UserName" class="form-control" required  />
<div class="is-invalid">
        <?php echo $errors['UserName']??''  ?>
    </div>
    <label  class="form-label ">Email</label>
<input type="email" name="email" class="form-control" required  />
<div class="is-invalid">
        <?php echo $errors['email']??''  ?>
    </div>

    <label  class="form-label ">Password</label>
<input type="text" name="password" class="form-control" required  />
<div class="is-invalid">
        <?php echo $errors['password']??''  ?>
    </div>

    <label  class="form-label ">Role</label>
<input type="text" name="role" class="form-control" required  />
<div class="is-invalid">
        <?php echo $errors['role']??''  ?>
    </div>

 
<button type="submit"  class="btn btn-primary" name="btn-save" > 
  <span class="glyphicon glyphicon-plus" ></span>save 
</button>

</form>


</div>

<?php include_once 'includ/footer.php';  ?>