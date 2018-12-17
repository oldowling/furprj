<?php
include 'header.php';
if($_SESSION['userinfo']['role']>2){
    header('Location: list-projects.php');
    die();
}
?>

<body class="animsition"  ng-controller="projectCTRL">
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
                                        <li class="list-inline-item">New Projects</li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input class="au-input--w300 au-input--style2" type="text" placeholder="Search for Projects">
                                    <button class="au-btn--submit2" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                </form>
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
                                        <strong>Add new </strong> Project
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input"  ng-model="project.name" name="text-input" placeholder="Project Name" class="form-control">
                                                    <small class="form-text text-muted">type project name here</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Description</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="textarea-input"  ng-model="project.description" id="textarea-input" rows="9" placeholder="Project Brief Description ..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Course Stream</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select ng-model="project.workstream" name="select" id="select" class="form-control">
                                                        <option value="0">Please select</option>
                                                        <option value="1">IT</option>
                                                        <option value="2">Business</option>
                                                        <option value="3">HR</option>
                                                        <option value="4">Legal</option>
                                                        <option value="5">Finance</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Programing Languages</label>
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
                                                    <label class=" form-control-label">Status</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label for="inline-radio1" class="form-check-label ">
                                                            <input type="radio" id="inline-radio1" name="inline-radios" value="1" class="form-check-input">Approved
                                                        </label>
                                                        <label for="inline-radio2" class="form-check-label ">
                                                            <input type="radio" id="inline-radio2" name="inline-radios" value="2" class="form-check-input">Review 
                                                        </label>
                                                        <label for="inline-radio3" class="form-check-label ">
                                                            <input type="radio" id="inline-radio3" name="inline-radios" value="3" class="form-check-input">Draft
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" ng-click="addproject()" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" ng-click="resetproject()" class="btn btn-danger btn-sm">
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
app.controller('projectCTRL', function($scope, $http){
    $scope.addproject = function()
    {
        var selMulti = $.map($("#multiple-select option:selected"), function (el, i) {
             return $(el).text();
         });
        $scope.project.language=selMulti.join(",");
        $scope.project.status=$("input[name='inline-radios']:checked").val();
        $.ajax({url:"backend/projectf.php",type:'POST',
             data:{"addproject":"yes","rdata":$scope.project},
              success:function(response)
              {
                  response=JSON.parse(response);

                  if(response.effected>0){
                     toastr.success("Success","New Project Added Successfully");
                      $scope.project={};
                      $scope.$digest();
                  }else{
                      toastr.error("Error","Something went wrong");
                  }
              }
        });
    }
    $scope.resetproject=function(){
        $scope.project={};
        $scope.$digest();
    }

});      

</script>
</html>
<!-- end document-->
