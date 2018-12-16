<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    header('Location: main.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en" ng-app="app" ng-controller="loginCTRL">

<head >
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a style="color: #000; font-size: 25px; text-transform: uppercase; font-weight: bolder;" href="#">
                                Find Your Project
                            </a>
                        </div>
                        <div class="login-form">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input id="email" class="au-input au-input--full" type="email" name="email"  ng-model="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" class="au-input au-input--full" type="password" name="password" ng-model="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
<!--
                                    <label>
                                        <a href="forget-pass.html">Forgotten Password?</a>
                                    </label>
-->
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;"  ng-click="login()">sign in</button>
                            
<!--
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register.html">Sign Up Here</a>
                                </p>
                            </div>
-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
<?php
    include 'footer.php';
?>

</body>
<script>
app.controller('loginCTRL', function($scope, $http){
$scope.login = function()
{
      if($("#email").val()=='' || $("#password").val()=='')
      {
          toastr.warning("warning","Please Enter Email and Password");
          return;
      }
          $scope.resultstatus = "waiting";
          req = {"logincheck":"1","email":$scope.email,
                        "password":$scope.password};
          $.ajax({url:"backend/loginf.php",type:'POST',
                 data:req,
                  success:function(response)
                  {
                    $scope.resultstatus=response;
                    if(response=='found')
                    {
                        toastr.success("Successfully","Logged IN");  
                        window.location= "main.php";
                        return;
                    }
                    else
                    {
                         toastr.error("Error","Email or password is incorrect");  
                    }

                  }
        });
      }
});      
</script>
</html>
<!-- end document-->