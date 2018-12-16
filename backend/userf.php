<?php
require_once("db.php");

if(isset($_POST['adduser']))
 {
    $_POST['rdata']['password']=password_hash($_POST['rdata']['password'],1);
    insert("users",$_POST['rdata']);
 }
if(isset($_POST['getuser']))
 {
    $res =  $obj->getData("select `userid`,`username`,`email`,`qualification`,`experience`,`objective`,`skills`,`status`,`role` FROM users where role>1");
    echo json_encode($res); 
 }
 
 if(isset($_POST['updateuser']))
 {
    if(!empty($_POST['rdata']['password'])){
     $_POST['rdata']['password']=password_hash($_POST['rdata']['password'],1);
    }
    update("users",$_POST['rdata'],"userid=?");
 }
 if(isset($_POST['deleteuser']))
 {
    $q="update users set status='0' WHERE userid=?";
    $type="i";
    $params= array();
    array_push($params, $_POST['userid']);
    echo json_encode($obj->executeQuery($q,$type,$params));

 }

?>