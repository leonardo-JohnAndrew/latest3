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
          outline: solid 0px;
          outline-color: #4376A3;
          width: 120px;
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
       #delete{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 85px;
         height: 30px;
         /* top: 910px; */
         /* gap: 0px; */
         border-radius: 25px 0px 0px 25px;
         opacity:0px;
         color:white;
       }
       #update{
         background: linear-gradient(90deg, #4376A3 0%, #192C3D 100%);
         width: 85px;
         height: 30px;
         /* top: 910px;
         gap: 0px; */
         border-radius: 0px 25px 25px 0px;
         opacity:0px;
         color:white;
        } .search{
        margin-top: 1px;
        border: 1px solid;
        border-color: #4376A3;
        outline: 2px;
        height: 30px;
       }#span{
        height: 33px;
        background-color: #0e2238;
        color: white;
        text-align: center;
        width: 100px;
       } 
        
       
    </style>
</head>
<body>
<form action="update.php"  method="post">
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
    <p class="fs-2 fw-lighter" style="font-style: italic ;">Manage Accounts
     
    </p>
    <div class="input-group mb-3">
  <span class="input-group-text" id="span">Search</span>
  <input type="text" class="search" size="50" placeholder=" Input : Unique id, Name, Username, or Type">
</div>
     <div class="tabl-wrapper" style="max-height: 430px;overflow-y:scroll " id ="search">
     <table class="table table-striped " >
         <thead  style="background-color:#0e2238; color:white">
            <th></th>
            <th  class=" head fs-6 fw-medium  ">Unique id</th>
          <th  class=" head fs-6 fw-medium ">Firstname</th>
           <th  class=" head  fs-6 fw-medium ">Middle
           </th>
           <th  class=" head  fs-6 fw-medium ">Lastname</th>
           <th  class=" head  fs-6 fw-medium ">Username</th>
           <th  class=" head  fs-6 fw-medium ">Email</th>
           <th  class=" head  fs-6 fw-medium ">Password</th>
          <th  class=" head  fs-6 fw-medium " >Type</th>
         </thead>
         <div class="scroll">
         <tbody>
          <?php
          $sqlaccounts ="SELECT * from create_users";
           $result = $sqlconnect->query($sqlaccounts);
           if(!$result){
               echo"error select";
           }
           while($rows = $result->fetch_assoc()){
          ?>
           <tr>
            <td> <input type="checkbox" name ="key[]" value="<?php echo $rows['unique_id'] ?>"></td>
            <td> <?php echo $rows['unique_id'] ?></td>
             <td><input type="text" name="firstname_<?= $rows['unique_id']?>"  size="10px" value=" <?php echo $rows['first_name'] ?>"><?php ?></td>
             <td><input type="text" name="middle_<?= $rows['unique_id']?>"  size="10px" value=" <?php echo $rows['middle_name'] ?>"></td>
             <td><input type="text" name="lastname_<?= $rows['unique_id']?>" size="10px" value=" <?php echo $rows['last_name'] ?>"></td>
             <td><input type="text" name="user_<?= $rows['unique_id']?>" size="10px" value=" <?php echo $rows['user_name'] ?>"></td>
             <td><input type="text" name="email_<?= $rows['unique_id']?>"  size="27px" value=" <?php echo $rows['email_address'] ?>"></td>
             <td><input type="text" name="password_<?= $rows['unique_id']?>" size="10px" value=" <?php echo $rows['password'] ?>"></td>
             <td><select style="font-size: smaller;" name="type_<?= $rows['unique_id']?>" >
             <option selected><?php echo $rows['type']?></option>
             <option value="Admin">Admin
              <option value="Faculty">Faculty
              <option value="Student">Student</option>
              </option>
              </option>
             </select></td>
       
           </tr>
  <?php }?>
         </tbody>
         </div>
      </table>
    </div> 
  </div>
  <div class = "btn-group" style="margin-top:1% ;margin-left:85%">
       <input  class = " delete" type="submit" name = "delete" value="DELETE" id="delete">
       <input type="submit" name = "update" value = "UPDATE" id = "update"> 
      </div>
 <?php 
   include('./footer.php')
   ?>
 
 
 </form>
 <script src = "jquery.js"></script>
 <script>
   $(document).ready(function(){
        $(".search").keyup(function(){
          var input = $(this).val();
      if(input!=""){
            $.ajax({
              url:"manage.php",
              method:"POST",
              data:{input:input},
              success:function(data){
                $(".tabl-wrapper").html(data);
              }
            })
      }else{
        $.ajax({
              url:"null.php",
              method:"POST",
              data:{input:input},
              success:function(data){
                $(".tabl-wrapper").html(data);
              }
            })
      }
       
        })
   })
 </script>

</body>
</html>