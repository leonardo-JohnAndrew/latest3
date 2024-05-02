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
  }.butn{
        background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 80px;
         height: 25px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         font-size: 9pt;
         padding :0px 2px 2px 2px;
         opacity:0px;
         color:white;
       } #btn{
        background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 500px;
         height: 40px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         margin-left: 90%;
         font-size: 14pt;
         padding :6px 6px 6px 6px;
         opacity:0px;
         color:white;
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
                           
                          </ul>
                       </li>
                       <li class="sidebar-item">
                    <a href="equipmentrequest.php" class="sidebar-link">
                        <img src="./pic/request.png" alt="logo" width="25px">
                        <span>Equipment Request</span>
                      </a>
                        </li>
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
         
          <?php include('./reportequip.php') ?>

        <?php 
          include('./footer.php') ?>

      </div>
    </div>
   
    <script src="script.js"></script>

</body>

</html>