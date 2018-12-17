<?php
include 'header.php';
if($_SESSION['userinfo']['role']>1){
    header('Location: list-projects.php');
    die();
}
?>
<body class="animsition"  ng-controller="userCTRl">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include 'topnav.php'; ?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include 'topnavmobile.php'; ?>      
<!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">New User</li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
   <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add new </strong> User
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="username-input" name="text-input" ng-model="user.username"  placeholder="User Name" class="form-control">
                                                    <small class="form-text text-muted">Type User name here</small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Email</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email-input" name="text-input" ng-model="user.email"  placeholder="User Email" class="form-control">
                                                    <small class="form-text text-muted">Type User Email here</small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="password-input" name="text-input" ng-model="user.password"  placeholder="Password" class="form-control">
                                                    <small class="form-text text-muted">Type Password here</small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Course Stream</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="select" id="selectqualification" class="form-control" ng-model="user.qualification">
                                                        <option value="0">Please select</option>
                                                        <option value="1">BSHBISE</option>
                                                        <option value="2">BSHCHCI</option>
                                                        <option value="3">BSHHRC</option>
                                                        <option value="4">BSHBTCE</option>
                                                    </select>
                                                </div>
                                            </div>   
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Year in college</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input ng-model="user.experience" type="text" id="experience-input" name="text-input" placeholder="Students Experience" class="form-control">
                                                    <small class="form-text text-muted">Total years spent in college</small>
                                                </div>
                                            </div>                                            

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Skills</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                                        <option value="1">HTML</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">JS</option>
                                                        <option value="4">BOOTSTRAP</option>
                                                        <option value="5">PHP</option>
                                                        <option value="6">MYSQL</option>
                                                        <option value="7">ANGULAR</option>
                                                        <option value="8">ASP</option>
                                                        <option value="9">SQL</option>
                                                    </select>
                                                </div>
                                            </div>
                                             
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Objectives</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select ng-model="user.objective" name="select" id="selectobjectives" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Learning</option>
                                                        <option value="2">Execution</option>
                                                        <option value="3">Challenge</option>
                                                        <option value="4">Explore</option>
                                                    </select>
                                                </div>
                                            </div>  
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Role</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select ng-model="user.role" name="select" id="selectrole" class="form-control">
                                                        <option value="">Please select</option>
                                                        <option value="2">Academics Manager</option>
                                                        <option value="3">Student</option>
                                                    </select>
                                                </div>
                                            </div>   
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" ng-click="adduser()" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" ng-click="resetuser()" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                           </div>
                           
                        
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>

    </div>

 <?php
include 'footer.php';
?>

</body>
<script>
app.controller('userCTRl', function($scope, $http){
    $scope.user={};
    $scope.adduser = function()
    {
        var selMulti = $.map($("#multiple-select option:selected"), function (el, i) {
             return $(el).text();
         });
        $scope.user.skills=selMulti.join(",");
        $.ajax({url:"backend/userf.php",type:'POST',
             data:{"adduser":"yes","rdata":$scope.user},
              success:function(response)
              {
                  response=JSON.parse(response);

                  if(response.effected>0){
                     toastr.success("Success","New User Added Successfully");
                      $scope.user={};
                      $scope.$digest();
                  }else{
                      toastr.error("Error","Something went wrong");
                  }
              }
        });
    }
    $scope.resetuser=function(){
        $scope.user={};
        $scope.$digest();
    }

});      

</script>
</html>
<!-- end document-->
