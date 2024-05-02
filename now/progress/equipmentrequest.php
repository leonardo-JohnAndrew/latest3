<!DOCTYPE html>
<?php 
session_start();
include('./header.php');
//if($_SESSION["validate"] != "accept"){
 // header('location:login.php');
//}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LABVISION</title>
</head>
<style>
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
                      <span><?php echo $_SESSION['name'] ?></span>
                     
                     </center>
                    </a>
                </li>
                 <ul class ="sidebar-nav">
                 <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <img src="./pic/attendance.png" alt="logo" width="25px">
                        <span>E-Monitoring</span>
                    </a>
                   </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#report" aria-expanded="false" aria-controls="report">
                        <img src="./pic/report.png" alt="logo" width="25px">
                           <span>Reports</span>
                        </a> 
                          <ul id="report" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                            <li class="sidebar-item">
                                <a href="requestview.php" class="sidebar-link">Equipment Request Viewing </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="reportview.php" class="sidebar-link">Equipment Report Viewing </a>
                            </li>
                            <li class="sidebar-item">
                          </ul>
                       </li>
                       <li class="sidebar-item">
                    <a href="equipmentrequest.php" class="sidebar-link">
                        <img src="./pic/request.png" alt="logo" width="25px">
                        <span>Equipment Request</span>
                      </a>
                        </li>
                        <li class="sidebar-item">
                    <a href="equipreport.php" class="sidebar-link">
                        <img src="./pic/request.png" alt="logo" width="25px">
                        <span>Report Equipment</span>
                      </a>
                        </li>
                     
                       </ul>
                 </aside>
      <div class="main">
        <?php include('./facultyre.php') ;
          include('./footer.php') ?>

      </div>
    </div>
   
    <script src="script.js"></script>

</body>

</html>