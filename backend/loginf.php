<?php
require('db.php');
$_SESSION['set']=null;
$added = false;
if(isset($_POST['logincheck']))
{
    
    $email  = $_POST['email'];
    $password = $_POST['password'];
   
    if(!$email)
    {
       $result = "invalid login" ;
    }
    else if(!$password)
    {
        $result = "invalid password" ;
    }
    else
    {
        $result = $obj->getData("select * from users where status='1' and email = '{$email}'");
        $s=json_decode($result['data'],true);
    if (empty($s))
    {
       echo trim("none");
      // echo "select * from users where loginid = '{$loginid}' AND password = '".md5($password)."'";
    }
    else
    {
       if(password_verify($password,$s[0]['password'])){
          
          $_SESSION["loggedin"] = true;
          $ar= array('userid'=>$s[0]['userid'],'role'=>$s[0]['role'],'username'=>$s[0]['username'],'email'=>$s[0]['email']);
          $_SESSION["userinfo"] = $ar;
          echo trim("found");
        }
        else{
          echo ("password Do Not Match");
        }
    }
  }
}
?>
