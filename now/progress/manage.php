<?php
require('./database.php');
// if(isset($_POST['input'])){
//   $input = $_POST['input'];
//   $query ="SELECT * from create_users where name like '%$input%'";
//   $rs = mysqli_query($sqlconnect,$query);
// }
if(isset($_POST['input'])){
  $input = $_POST['input'];
?>
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
           <th  class=" head fs-6 fw-medium">Type</th>
         </thead>
         <div class="scroll">
         <tbody>
          <?php
          $sqlaccounts ="SELECT * from create_users where first_name like '%$input%'or unique_id like'%$input%' or last_name like '%$input%' or middle_name like '%$input%' or user_name like '%$input%' or email_address like '%$input%' or type like '%$input%'  ";
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
             <td><input type="text" name="lastname_<?= $rows['unique_id']?>"  size="10px" value=" <?php echo $rows['last_name'] ?>"></td>
             <td><input type="text" name="middle_<?= $rows['unique_id']?>" size="10px" value=" <?php echo $rows['middle_name'] ?>"></td>
             <td><input type="text" name="username_"<?= $rows['unique_id']?> size="10px" value=" <?php echo $rows['user_name'] ?>"></td>
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
<?php }?>