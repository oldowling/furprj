<?php
include 'header.php';
if($_SESSION['userinfo']['role']>1){
    header('Location: list-projects.php');
    die();
}
?>

<body class="animsition" ng-controller="userCTRL">
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
                                        <li class="list-inline-item">Users List</li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <span id="searchbar">
                                    <input  ng-model="search.username" class="au-input--w300 au-input--style2" type="text" placeholder="Search for Users">
                                    <button class="au-btn--submit2" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                  </span>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
   <!-- DATA TABLE-->
            <section id="userlistsection" class="p-t-20" >
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-data__tool">
                                                            <h3 class="title-5 m-b-35">List of Users</h3>

                                <div class="table-data__tool-right">
                                    <a href="new-user.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>add user</a>

                                </div>
                            </div>
                       <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                  <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>Skills</td>
                                                    <td>Course Stream</td>
                                                    <td>Year</td>
                                                    <td>OBJECTIVES</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-repeat="u in userslist | filter:search"> 
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{u.username}}</h6>
                                                            <span>
                                                                <a href="#">{{u.email}}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role admin">{{u.skills}}</span>
                                                    </td>
                                                    <td>
                                                        <span ng-if="u.qualification==1">IT</span>
                                                        <span ng-if="u.qualification==2">Business</span>
                                                        <span ng-if="u.qualification==3">HR</span>
                                                        <span ng-if="u.qualification==4">Legal</span>
                                                        <span ng-if="u.qualification==5">Finance</span>
                                                    </td>
                                                    <td>
                                                        {{u.experience}} Years
                                                    </td>
                                                    <td>
                                                        <span ng-if="u.objective==1">Learning</span>
                                                        <span ng-if="u.objective==2">Execution</span>
                                                        <span ng-if="u.objective==3">Challenge</span>
                                                        <span ng-if="u.objective==4">Explore</span>
                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" ng-click="getuserdetails(u)" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            <button class="item" ng-click="deleteuser(u.userid,$index)" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

            
            
            <section id="updateusersection" class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Update </strong> User
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
                                                    <label for="text-input" class=" form-control-label">Experience</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input ng-model="user.experience" type="text" id="experience-input" name="text-input" placeholder="User Experience" class="form-control">
                                                    <small class="form-text text-muted">Working years as a professional</small>
                                                </div>
                                            </div>                                            

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">Skills</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                                        <option value="HTML">HTML</option>
                                                        <option value="CSS">CSS</option>
                                                        <option value="JS">JS</option>
                                                        <option value="BOOTSTRAP">BOOTSTRAP</option>
                                                        <option value="PHP">PHP</option>
                                                        <option value="MYSQL">MYSQL</option>
                                                        <option value="ANGULAR">ANGULAR</option>
                                                        <option value="ASP">ASP</option>
                                                        <option value="SQL">SQL</option>
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
                                        <button type="button" ng-click="updateuser()" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update User
                                        </button>
                                        <button ng-click="backtolist()" class="btn btn-info btn-sm">
                                                <i class="zmdi zmdi-plus"></i>Back To User List</button>

                                    </div>
                                </div>
                           </div>
                           
                        
                        </div>
                    </div>
                </div>
            </section>
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
    app.controller('userCTRL', function($scope, $http){  
        $scope.showuserlist=function(){
            $('#userlistsection').show();
            $('#searchbar').show();
            $('#backtolist').hide();
            $('#updateusersection').hide();
        }
        $scope.showuserlist();

        $scope.getuserlist = function()
        {
            $.ajax({url:"backend/userf.php",type:'POST',
                 data:{"getuser":"yes"},
                  success:function(response)
                  {
                      response=JSON.parse(response);
                      if(response.errors.length>0)
                        {
                            toastr.error("Error","Something went wrong");
                        }else{
                            $scope.userslist=JSON.parse(response.data);
                            console.log($scope.userslist);
                            $scope.$digest();
                        }
                  }
            });
        }

        $scope.getuserlist();


        $scope.getuserdetails=function(u){
            $('#userlistsection').hide();
            $('#searchbar').hide();
            $('#backtolist').show();
            $('#updateusersection').show();
            
            var skills=u.skills;
            $.each(skills.split(","), function(i,e){
                $("#multiple-select option[value='" + e + "']").prop("selected", true);
            });
        
            $scope.user=u;
        }

        $scope.backtolist=function(){
            $('#userlistsection').show();
            $('#searchbar').show();
            $('#backtolist').hide();
            $('#updateusersection').hide();
        }

        $scope.deleteuser = function(id,indx)
        {
            $.ajax({url:"backend/userf.php",type:'POST',
                 data:{"deleteuser":"yes","userid":id},
                  success:function(response)
                  {
                      response=JSON.parse(response);
                      console.log(response.effected);
                      if(response.effected>0)
                        {
                            $scope.userslist.splice(indx,1);
                            toastr.success("Sucess","user Deleted Successfully");
                        }else{
                            toastr.error("Error","Something went wrong");
                        }
                  }
            });
        }

        $scope.updateuser = function()
        {
            var len = $("select[name='multiple-select'] option:selected").length;

            if(len>0){
                var selMulti = $.map($("#multiple-select option:selected"), function (el, i) {
                   return $(el).text();
                });
                $scope.user.skills=selMulti.join(", ");
            }
            $.ajax({url:"backend/userf.php",type:'POST',
                 data:{"updateuser":"yes","rdata":$scope.user},
                  success:function(response)
                  {
                      response=JSON.parse(response);
                      console.log(response.effected);
                      if(response.effected>0)
                        {
                            toastr.success("Sucess","User Updated Successfully");
                        }else{
                            toastr.error("Error","Something went wrong");
                        }
                  }
            });
        }

        
    });
</script>
</html>
<!-- end document-->
