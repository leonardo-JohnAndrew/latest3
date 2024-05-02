<?php 
require('./database.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          input{
            border: 0px solid;
            height: 20px;
            /* text-size-adjust: 3px; */
            outline:none;
            background:transparent;
           
          
         } input[type='text']{
          font-size: 10pt;
         }
         thead {

          position: sticky;
          top:0px
         } select{
          outline: 5px;
          outline-color: #0e2238;
          width: 120px;
          height:25px;
          min-width:  120px;
          gap: 0;
        
   
        
         } button{
         border:none;
         outline:none;
         font-size: 20px;
         font:bolder;
         color:black;
         background-color: lightgrey;
       }
       #clear{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 85px;
         height: 30px;
         /* top: 910px; */
         /* gap: 0px; */
         border-radius: 25px 0px 0px 25px;
         opacity:0px;
         color:white;
       }
       #create{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 85px;
         height: 30px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 0px 25px 25px 0px;
         opacity:0px;
         color:white;
       } 
        
       
    </style>
</head>
<body>
<form action="action.php"  method="post">
   <div class="container-fluid">
    <div class="col mt-3  me-5 mb-5 text-secondary  " style="width: 100%; min-height:500px">
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
    <p class="fs-2 fw-light" style="font-style: italic ;">Create Accounts
      <div>
      <button style="margin-left:92%; " class=" btn_add">
         <img src="plus.svg" style="color: white;" >ADD
      </button>
      </div>
    </p>
     <div class="tabl-wrapper" style="max-height: 420px;overflow-y:scroll;">
       <table class="table table-striped " >
         <thead  style="background-color:#0e2238; color:white">
           <th  class=" head fs-6 fw-medium ">Firstname</th>
           <th  class=" head  fs-6 fw-medium ">Middle
           </th>
           <th  class=" head  fs-6 fw-medium ">Lastname</th>
           <th  class=" head  fs-6 fw-medium ">Username</th>
           <th  class=" head  fs-6 fw-medium ">Email</th>
           <th  class=" head  fs-6 fw-medium ">Password</th>
           <th  class=" head fs-6 fw-medium">Type</th>
         </thead>
         <div class="scroll">
         <tbody>
           <tr>
             <td><input type="text" name="firstname[]"  size="10px"><?php ?></td>
             <td><input type="text" name="lastname[]"  size="10px"></td>
             <td><input type="text" name="middle[]" size="10px"></td>
             <td><input type="text" name="username[]" size="10px"></td>
             <td><input type="text" name="email[]"  size="28px"></td>
             <td><input type="text" name="password[]" size="10px"></td>
             <td><select style="font-size: smaller;" name="type[]" value = "none">
              <option selected>Type</option>
              <option value="Admin">Admin
              <option value="Faculty">Faculty
              <option value="Student">Student</option>
             </select></td>
       
           </tr>
           
         </tbody>
         </div>
      </table>
      </div>
    </div> 
  </div>
  <div class = "btn-group" style="margin-top:1% ;margin-left:85%">
       <input  class = " clear" type="submit" name = "clear" value="CLEAR" id="clear">
       <input type="submit" name = "create" value = "CREATE" id = "create"> 
      </div>
 <?php 
    require('./function.php');
   include('./footer.php')
   ?>
 
 
 </form>
</body>
</html>