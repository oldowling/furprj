<?php
require_once("db.php");

if(isset($_POST['getstats']))
 {
    $usercount =  $obj->getData("select count(`userid`) as usercount FROM users where role>1");
    $projectcount =  $obj->getData("select count(`projectid`) as projectcount FROM projects");
    
    if($_SESSION['userinfo']['role']==3){
        $projectassigncount =  $obj->getData("select count(`projectid`) as projectassigncount FROM projects where assignto='{$_SESSION['userinfo']['userid']}'");
    }else{
        $projectassigncount =  $obj->getData("select count(`projectid`) as projectassigncount FROM projects where assignto>0"); 
    }
    $usercount=json_decode($usercount['data'],true)[0];
    $projectcount=json_decode($projectcount['data'],true)[0];
    $projectassigncount=json_decode($projectassigncount['data'],true)[0];
    $res=array(
        "usercount"=>$usercount,
        "projectcount"=>$projectcount,
        "projectassigncount"=>$projectassigncount,
        "errors"=>[]
    );
    echo json_encode($res);
 }

?>