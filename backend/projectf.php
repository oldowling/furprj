<?php
require_once("db.php");

if(isset($_POST['addproject']))
 {
     insert("projects",$_POST['rdata']);
 }
if(isset($_POST['getproject']))
 {
    if($_SESSION['userinfo']['role']==3){
         $res =  $obj->getData("select * FROM projects where assignto='{$_SESSION['userinfo']['userid']}'");
    }
    else{
        $res =  $obj->getData("select * FROM projects"); 
    }
   
    echo json_encode($res); 
 }
 


if(isset($_POST['getteamleads']))
 {
    $res =  $obj->getData("select `userid`,`username`,`email` FROM users where role='3'");
    echo json_encode($res); 
 }


 if(isset($_POST['updateproject']))
 {
    update("projects",$_POST['rdata'],"projectid=?");
 }
 if(isset($_POST['deleteproject']))
 {
    $q="update projects set activestatus='0' WHERE projectid=?";
    $type="i";
    $params= array();
    array_push($params, $_POST['projectid']);
    echo json_encode($obj->executeQuery($q,$type,$params));

 }

if(isset($_POST['markfavorite']))
 {
    if($_POST['favorite']=='1'){
      $_POST['favorite']=0;
    }else{
      $_POST['favorite']=1;  
    }
    $q="update projects set favorite='{$_POST['favorite']}' WHERE projectid=?";
    $type="i";
    $params= array();
    array_push($params, $_POST['projectid']);
    echo json_encode($obj->executeQuery($q,$type,$params));

 }
?>