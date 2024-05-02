<!DOCTYPE html>
<?php 
session_start();
include('./header.php');
$name = $_SESSION['name'];
require('./database.php');
 ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit Reports</title>
  
      <style>
         #pending{
           background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
           width: 240px;
           border-radius: 25px 25px 25px 25px;
           opacity:0px;
           color:white;
           margin-left: 850px ;
         }  a{
    text-decoration: none;
  } 
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
         } #Submit{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 150px;
         height: 30px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 25px 25px 25px 25px;
         opacity:0px;
         color:white;
       }  thead {
        position: sticky;
        top:0px
       }
      </style>
      
  </head>
 
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
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"     data-bs-target="#invent" aria-expanded="false" aria-controls="invent">
                        <i class="fa-solid fa-list"></i><span>Inventory<span>
                        </a> 
                          <ul id="invent" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                            <li class="sidebar-item">
                                <a href="laboratory.php" class="sidebar-link">Laboratory</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="codes.php" class="sidebar-link">Codes</a>
                            </li>
                          </ul>
                     </li>
                     <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"     data-bs-target="#report" aria-expanded="false" aria-controls="report">
                           <i class="fa-solid fa-file"></i>
                           <span>Reports</span>
                        </a> 
                          <ul id="report" class ="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar"  >
                            <!-- <li class="sidebar-item">
                                <a href="pending.php" class="sidebar-link">Pendings</a>
                            </li> -->
                            <li class="sidebar-item">
                                <a href="reports.php" class="sidebar-link">Unit Reports</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="unitrequest.php" class="sidebar-link">Unit Request</a>
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
       <?php include ("./rp.php")  ?>
      </div>
</div>
<script src="script.js"></script>


</body>

</html>