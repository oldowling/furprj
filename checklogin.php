<?php
 session_start();
 if(!isset($_SESSION['loggedin']))
{
    header('Location: index.php');
    die();
}
else{
    if(isset($_SESSION['loggedin']))
    {
        echo "<script>var loggedin = '{$_SESSION['loggedin']}';</script>";
        echo "<script>var username = '{$_SESSION['userinfo']['username']}';</script>";
        echo "<script>var sessionid = '{$_SESSION['userinfo']['userid']}';</script>";
    }else{
        header('Location: index.php');
        echo "<script>var loggedin = '';</script>";
        echo "<script>var username = '';</script>";
        echo "<script>var sessionid = '';</script>";
        die();
    }
}
?>