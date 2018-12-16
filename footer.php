 <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
var app = angular.module('app',[]);
          
 function ajaxcall(rurl,rdata,successfunc,title,message)
  {
      if(!title)
       $.ajax({ url: rurl, data:  rdata  ,
                success: function(data)
                {
                    data = JSON.parse(data);
                    //data.data = JSON.parse(data.data);
                    if(data.errors.length>0)
                     {
                        $.each(data.errors, function(ind,e){
                          console.log(" --"+e.message);
                          toastr.error("Warning",e.message);
                          });
                     }
                      else
                     {
                      if(successfunc)
                      {
                          successfunc(data);
                          return;
                      }
                     if(rdata.reload)
                     {
                      setTimeout(function(){location.reload()},2500);
                     }
                     console.log();
                     if(!title)
                     {
                       toastr.success("Successfully Done",3000,"green");
                     }else{
                       toastr.success("Successfully Done",3000,"green");
                     }

                     }

                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                     
                      console.log(jqXHR);
                      alert("Server Error");
                },
                type: 'POST' ,
     });
  }
</script>