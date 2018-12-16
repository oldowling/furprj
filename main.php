<?php
include 'header.php';
?>
<style>
    .favoritegreen{
        color:green!important;
    }
</style>
<body class="animsition" ng-controller="mainCTRl">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php include 'topnav.php'; ?>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <?php include 'topnavmobile.php'; ?>  
        <!-- END HEADER MOBILE -->

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
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                                <form class="au-form-icon--sm" action="" method="post">
                                    <input ng-model="search.name" class="au-input--w300 au-input--style2" type="text" placeholder="Search for Projects">
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

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span>John!</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">{{projectcount}}</h2>
                                <span class="desc">Total Projects</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">{{projectassigncount}}</h2>
                                <span class="desc">Assigned Projects</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number">{{usercount}}</h2>
                                <span class="desc">Users</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->


             <section id="projectlistsection" class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title-5 m-b-35">List of Projects</h3>
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="rs-select2--light rs-select2--md">
                                        <select ng-model="search.workstream"  name="property">
                                            <option value="">Work Stream</option>
                                            <option value="{{1}}">IT</option>
                                            <option value="{{2}}">Business</option>
                                            <option value="{{3}}">HR</option>
                                            <option value="{{4}}">Legal</option>
                                            <option value="{{5}}">Finance</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div  class="rs-select2--light rs-select2--sm">
                                        <select  ng-model="search.status" name="time">
                                            <option value="">Status</option>
                                            <option value="{{1}}">Approved</option>
                                            <option value="{{2}}">Review</option>
                                            <option value="{{3}}">Draf</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                    <div  class="rs-select2--light rs-select2--sm">
                                        <select  ng-model="search.favorite" name="time">
                                            <option value="">Favorite</option>
                                            <option value="{{1}}">Yes</option>
                                            <option value="{{0}}">No</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div> 
                                </div>
                                
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
<!--
                                            <th>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </th>
-->
                                            <th>name</th>
                                            <th>work stream</th>
                                            <th>description</th>
                                            <th>programming language</th>
                                            <th>status</th>
                                            <th>Project Status</th>
                                            <?php if($_SESSION['userinfo']['role']==1 || $_SESSION['userinfo']['role']==2) { ?> 
                                               <th>Action</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="tr-shadow" ng-repeat="p in projectlist | filter:search">
<!--
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
-->
                                            <td>{{p.name}}</td>
                                            <td>
                                                <span ng-if="p.workstream==1" class="work-stream">IT</span>
                                                <span ng-if="p.workstream==2" class="work-stream">Buisness</span>
                                                <span ng-if="p.workstream==3" class="work-stream">Legal</span>
                                                <span ng-if="p.workstream==4" class="work-stream">Finance</span>
                                            </td>
                                            <td class="desc">{{p.description}}</td>
                                            <td>{{p.language}}</td>
                                            <td>
                                                <span ng-if="p.status==1" class="status--process">Approved</span>
                                                <span ng-if="p.status==2" class="status--process">Review</span>
                                                <span ng-if="p.status==3" class="status--process">Draft</span>
                                            </td>
                                            
                                            <td>
                                                <span ng-if="p.activestatus==1" class="status--process">Active</span>
                                                <span ng-if="p.activestatus==0" class="status--process">Inactive</span>
                                                
                                            </td>
                                            <?php if($_SESSION['userinfo']['role']==1 || $_SESSION['userinfo']['role']==2) { ?>
                                                <td>
                                                    <div class="table-data-feature">
                                                      
                                                        <button class="item" ng-click="getprojectdetails(p)" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" ng-click="deleteproject(p.projectid,$index)" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button ng-if="p.favorite==1" class="item" ng-click="markfavorite(p.projectid,p.favorite)"  data-toggle="tooltip" data-placement="top" title="Favorite">
                                                            <i class="fas fa-heart favoritegreen"></i>
                                                        </button>
                                                        <button ng-if="p.favorite==0" class="item" ng-click="markfavorite(p.projectid,p.favorite)"  data-toggle="tooltip" data-placement="top" title="Favorite">
                                                            <i class="fas fa-heart"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                                                          
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
            
            
             <section id="updateprojectsection" class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Update </strong> Project
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
                                                    <label for="select" class=" form-control-label">Work Stream</label>
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
                                                    <label for="multiple-select" class=" form-control-label">Assign To</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select ng-model="project.assignto" name="assignto"  class="form-control">
                                                        <option value="0">Select User</option>
                                                        <option ng-repeat="t in teamleadslist" value="{{t.userid}}">{{t.username}}</option>   
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
                                        <button type="submit" ng-click="updateproject()" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
                                        <button ng-click="backtolist()" class="btn btn-info btn-sm">
                                            <i class="zmdi zmdi-plus"></i>Back To Project List</button>

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
                                <p>Copyright © 2019 Find Your Project. All rights reserved. Developed by <a href="https://xtremewebtech.com">Xtreme Web Tech</a>.</p>
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
app.controller('mainCTRl', function($scope, $http){  
    
    $scope.showprojectlist=function(){
        $('#projectlistsection').show();
        $('#searchbar').show();
        $('#backtolist').hide();
        $('#updateprojectsection').hide();
    }
    $scope.showprojectlist();
    
    $scope.getprojectlist = function()
    {
        $.ajax({url:"backend/projectf.php",type:'POST',
             data:{"getproject":"yes"},
              success:function(response)
              {
                  response=JSON.parse(response);
                  if(response.errors.length>0)
                    {
                        toastr.error("Error","Something went wrong");
                    }else{
                        $scope.projectlist=JSON.parse(response.data);
                        console.log($scope.projectlist);
                        $scope.$digest();
                    }
              }
        });
    }
    
    $scope.getprojectlist();
    
    
    $scope.getteamleads=function(){
        $.ajax({url:"backend/projectf.php",type:'POST',
             data:{"getteamleads":"yes"},
              success:function(response)
              {
                  response=JSON.parse(response);
                  if(response.errors.length>0)
                    {
                        toastr.error("Error","Something went wrong");
                    }else{
                        $scope.teamleadslist=JSON.parse(response.data);
                        console.log($scope.teamleadslist);
                        $scope.$digest();
                    }
              }
        });
    }
    
    
    $scope.getdashboardstats = function()
    {
        $.ajax({url:"backend/statsf.php",type:'POST',
             data:{"getstats":"yes"},
              success:function(response)
              {
                  response=JSON.parse(response);
                  if(response.errors.length>0)
                    {
                        toastr.error("Error","Something went wrong");
                    }else{
                        
                        $scope.usercount=response.usercount.usercount;
                        $scope.projectcount=response.projectcount.projectcount;
                        $scope.projectassigncount=response.projectassigncount.projectassigncount;
                        $scope.$digest();
                    }
              }
        });
    }
    
    $scope.getdashboardstats();
    
    
    $scope.getprojectdetails=function(p){
        $scope.getteamleads();
        $('#projectlistsection').hide();
        $('#searchbar').hide();
        $('#backtolist').show();
        $('#updateprojectsection').show();
        $("input[name='inline-radios'][value='"+p.status+"']").prop('checked', true);
        var values=p.language;
        console.log(values);
        $.each(values.split(","), function(i,e){
            $("#multiple-select option[value='" + e + "']").prop("selected", true);
        });
        $scope.project=p;
    }
    
    $scope.backtolist=function(){
        $('#projectlistsection').show();
        $('#searchbar').show();
        $('#backtolist').hide();
        $('#updateprojectsection').hide();
    }
    
    $scope.deleteproject = function(id,indx)
    {
        $.ajax({url:"backend/projectf.php",type:'POST',
             data:{"deleteproject":"yes","projectid":id},
              success:function(response)
              {
                  response=JSON.parse(response);
                  if(response.effected>0)
                    {
                        $scope.projectlist.splice(indx,1);
                        toastr.success("Sucess","Project Deleted Successfully");
                    }else{
                        toastr.error("Error","Something went wrong");
                    }
              }
        });
    }
    
    $scope.updateproject = function()
    {
        var len = $("select[name='multiple-select'] option:selected").length;
        if(len>0){
            var selMulti = $.map($("#multiple-select option:selected"), function (el, i) {
                 return $(el).text();
             });
            $scope.project.language=selMulti.join(", ");
        }
        $.ajax({url:"backend/projectf.php",type:'POST',
             data:{"updateproject":"yes","rdata":$scope.project},
              success:function(response)
              {
                  response=JSON.parse(response);
                  if(response.effected>0)
                    {
                        toastr.success("Sucess","Project Updated Successfully");
                    }else{
                        toastr.error("Error","Something went wrong");
                    }
              }
        });
    }
    
    $scope.markfavorite=function(id,favorite){
        $.ajax({url:"backend/projectf.php",type:'POST',
             data:{"markfavorite":"yes","projectid":id,"favorite":favorite},
              success:function(response)
              {
                  response=JSON.parse(response);
                  if(response.effected>0)
                    {
                        toastr.success("Sucess","Project Marked as Favorite Successfully");
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