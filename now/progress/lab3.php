<?PHP 
$name = "ITLAB";// $_GET['id'];
require('./database.php');

?>

<!DOCTYPE html>
<?php 

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
    <title><?php echo $name ?></title>
</head>
<style>
  a{
    text-decoration: none;
    
  }table td{
    font-size: 9pt;
  }
</style>
<body>
    <div class="wrapper">
        <aside id="sidebar">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                     <center class="profile">
                      <i class="fa-solid fa-image"></i><br>
                      <span>Rose Ann</span>
                      <span>De Guzman</span>
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
                        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#report" aria-expanded="false" aria-controls="report">
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
                        <li class="sidebar-item">
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
                          </li>
                       </ul>
                 </aside>
      <div class="main">
           
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>
    <style>
          input{
            border: 0px solid;
            height: 20px;
      
            outline:none;
            background:transparent;
           
         } select{
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
<form action="update.php"  method="post">
   <div class="container-fluid">
    <div class="col mt-3  me-5 mb-5 text-secondary  " style=" width:100%; min-height:550px">
      <p class="fs-2 fw-lighter" style="font-style: italic ;"><?= $name ?></p>
      <div style=" max-height:500px;overflow-y:scroll ; ">
       <table class="table table-striped"   >
    
         <thead   style="background-color:#0e2238; color:white">
                  <th>NO.</th>
        <?php  $sqlaccounts ="SELECT Classifications from equipment ";
           $result = $sqlconnect->query($sqlaccounts);
            while(  $rows = $result->fetch_assoc()){
              $class[] = $rows ['Classifications']?>
                
               <th class="head  fs-6 fw-medium" ><?= $rows['Classifications']?></th>
                 
           <?php } 
         ?>

         </thead>
      <tbody>
          <?php 
          
              $qury = "SELECT distinct classifications from origcode" ;
              $rs = mysqli_query($sqlconnect,$qury);
              while($rows = $rs->fetch_assoc()){
                $class[]= $rows['classifications'];

              }
              $c  = count($class);
              for($i =0 ; $i<$c;$i++){
              ?> <tr>  <?php 
                $query = "SELECT code from origcode WHERE classifications = '$class[$i]' and laboratory = '$name' ";
                $sql = mysqli_query($sqlconnect,$query);
                while ($rs =$sql->fetch_assoc()){   
                  $code = $rs['code'];    
                
             ?>     
                    
             <td><?php echo $code; ?></td>
         
               
              
           <?php }?>
                </tr>
            <?php } ?>
         </tbody>
         
         </div>
      </table>
      </div>
    </div>
    
  </div>

    </div>
  </div>
</div>
 <?php 
 
   include('./footer.php')
   ?>
 

 </form>
</body>
</html>


      </div>
    </div>
   
    <script src="script.js"></script>

</body>

</html>