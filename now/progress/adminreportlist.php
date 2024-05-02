<!DOCTYPE html>
<?php 
session_start();
include('./header.php');
require('./database.php');
//if($_SESSION["validate"] != "accept"){
 // header('location:login.php');
//}
$name = $_SESSION['name'];

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABVISION</title>
</head>
<style>
          input{
            border: 0px solid;
            height: 20px;
            outline:none;
            background:transparent;
           
         }select{
          outline: 5px;
          outline-color: #0e2238;
          width: 120px;
          height:25px;
          min-width:  120px;
          gap: 0;
         } #btn{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 90px;
         height: 30px;
         font-size: 10pt;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         opacity:0px;
         color:white;
       }  thead {
        position: sticky;
        top:0px
       }
  
  
  a{
    text-decoration: none;
  }
</style>
<body>
<div class="wrapper">
        <aside id="sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                     <center class="profile">
                      <i class="fa-solid fa-image"></i><br>
                      <span><?php echo$_SESSION['name'] ?></span>
                   
                     </center>
                    </a>
                </li>
                 <ul class ="sidebar-nav">
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"     data-bs-target="#invent" aria-expanded="false" aria-controls="invent">
                        <i class="fa-solid fa-list"></i><span>Inventory<span>
                        </a>
                          <ul id="invent" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                            <li class="sidebar-item">
                                <a href="laboratory.php" class="sidebar-link">Laboratory</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="codes.php" class="sidebar-link">Codes</a>
                          </ul>
                     </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"     data-bs-target="#report" aria-expanded="false" aria-controls="report">
                           <i class="fa-solid fa-file"></i>
                           <span>Reports</span>
                        </a> 
                          <ul id="report" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                            <li class="sidebar-item">
                                <a href="pending.php" class="sidebar-link">Pendings</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="reports.php" class="sidebar-link">Unit Reports</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="unitrequest.php" class="sidebar-link">Unit Requests</a>
                            </li>
                          </ul>
                       </li>
                        <li class="sidebar-item">
                         <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"     data-bs-target="#manage" aria-expanded="false" aria-controls="manage">
                          <i class="fa-solid fa-user"></i><span>User Management<span>
                         </a>
                           <ul id="manage" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                              <li class="sidebar-item">
                                <a href="management.php" class="sidebar-link">Manage Accounts</a>
                              </li>
                              <li class="sidebar-item">
                                <a href="createaccounts.php" class="sidebar-link">Create Accounts
                                </a>
                              </li>
                           </ul>
                          </li>
                        </li>
                        <!-- <li class="sidebar-item">
                         <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"     data-bs-target="#status" aria-expanded="false" aria-controls="status">
                          <i class="ffa-solid fa-desktop"></i><span>Status<span>
                         </a>
                           <ul id="status" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                              <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Usage</a>
                              </li>
                              <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Laboratory Management
                                </a>
                              </li>
                             </ul>
                           </li>
                          </li> -->
                       </ul>
        </aside>
   
      <div class="main">
      <form action="add.php"  method="post">
   <div class="container-fluid">
    <div class="col mt-3  me-5 mb-5 text-secondary  " style="width: 100%; min-height:550px">
    <?php 
              if(isset($_SESSION['status'])){
                ?>
                 <div class="alert alert-primary alert-dismissible fade show "  role="alert">
                   <strong>STATUS: </strong> <?php echo $_SESSION['status']  ?>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
                <?php
                      unset($_SESSION['status']);
              }
            ?>
    <p class="fs-2 fw-lighter" style="font-style: italic ;">Report List
     </p>
     <div style="max-height:500px;overflow-y:scroll">
       <table class="table table-striped "  >
         <thead  style="background-color:#0e2238; color:white">
       
           <th>No</th>
           <th  class=" fs-6 fw-medium"style="">Classification</th>
           <th  class=" fs-6 fw-medium"style="">Laboratory</th>
           <!-- <th class="fs-6 fw-medium" >Code</th> -->
           <th  class=" head fs-6 fw-medium">Problem</th>
           <th  class=" head  fs-6 fw-medium">Date Reported
           </th>
           <th  class=" head  fs-6 fw-medium">Reported by </th>
        
           <th  class=" head  fs-6 fw-medium">Action</th>
          
         </thead>
         <div class="scroll">
         <tbody>
         <?php 
           $sqlaccounts ="SELECT * from unit_reports where remarks != 'Fixed'  order by no desc  ";
           $result = $sqlconnect->query($sqlaccounts);
           if(!$result){
               echo"error select";
           }
           while($rows = $result->fetch_assoc()){
         ?>
           <tr>
        
           <td><input type="text" class="no" value="<?php  echo $rows['No'] ?>" size="3px" readonly></td>
            <td><input type="text" class="class" name="class_<?= $rows['No'] ?>" value="<?php  echo $rows['classification'] ?>" size="8px" readonly></td>
             <td><input type="text"  class="labs" name="num_<?= $rows['No'] ?>" value="<?php  echo $rows['laboratory'] ?>" size="7px" readonly></td>
             <!-- <td><input type="text" class="code" name="name_" value="<?php //echo $rows['unit_code'] ?>" size="20px" readonly></td> -->
             <td><input type="text" name="" value="<?php echo $rows['problem'] ?>" size="10px" readonly></td>
             <td><input type="text"  class ="date"  name="" value="<?php  echo $rows['date_report'] ?>" size="10px" readonly></td>
             <td><input type="text" class="name" name="" value="<?php  echo $rows['reported_by'] ?>" size="20px" readonly></td>
             <!-- <td><input type="text" name="" value="<?php  //echo $rows['remarks'] ?>" size="10px" readonly></td> -->
             <td><input type="submit" id="btn"  class="fixed" value="Fixed">
                            <!-- temporaryonly -->
                        
            
            <?php }?>
         </tbody>
         </div>
      </table>
     </div>
    </div>
  </div>
  
  <div class="modal fade" id="example" tabindex="-1" aria-labelledby="examplelabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header " style="background-color:#0e2238;">
        <h1 class="modal-title fs-5" id="examplelabel" style="color: white;">Fixed</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  ></button>
      </div>
    
      <div class="modal-body">
         
         <div class="display">

         </div>
      </div>
      <div class="modal-footer">
       <input type="submit" class = "butn" id ="btn" name = "fixed" value="SUBMIT"  >
      </div>
    </div>
  </div>
</div>

 <?php 
   include('./footer.php');


   ?>
  <script src = "jquery.js"> 
</script>
    <script>
        $('document').ready(function(){
           $(".fixed").click(function(e){
            e.preventDefault();
            var id = $(this).closest('tr').find('.no').val();
             var clas = $(this).closest('tr').find('.class').val();
             var name = $(this).closest('tr').find('.name').val();
           var date = $(this).closest('tr').find('.date').val();
           //var code = $(this).closest('tr').find('.code').val();
           var labs = $(this).closest('tr').find('.labs').val();
           
           $.ajax({
            method:"post",
            url: "xamp2.php",
            data:{
               'Fixed':true ,
               'class':clas,
             'date':date,
               'num':id ,
              
               'labs':labs,
               'name':name,
               

            },
            success:function(response){
           $('.display').html(response);
          $('#example').modal('show');
            }

           })
            });
        });

    </script>
    

 </form>

      </div>
    </div>
   
    <script src="script.js"></script>

</body>

</html>