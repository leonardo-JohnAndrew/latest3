<?php
require ('./database.php');
 $name = $_GET['name'];
  $lab= $_GET['lab'];
    $class= $_GET['class'];
    $id = $_GET['id'];
   $remark = $_GET['remark'];
    $pass= $_GET['pass'];?>
<input type="text" name = "id" value="<?php echo  $id ?>" hidden>
<input type="text" name = "remark" value="<?php echo  $remark ?>" hidden>
<input type="text" name = "pass" value="<?php echo  $pass ?>" hidden>
<input type="text" name = "name" value="<?php echo  $name ?>" hidden>
<input type="text" name = "class" value="<?php echo  $class?>" hidden>
<input type="text" name = "lab" value="<?php echo  $lab ?>" hidden>
  


  <select name="range[]" id="code" class= form-control multiple  style="height:300px;overflow-y:scroll" >
    
 <?php  $sql1 = "SELECT code from codes where laboratory = '$lab' and classifications = '$class' order by code ";
                    $quey1 = mysqli_query($sqlconnect,$sql1);
              
                  while($rs = $quey1->fetch_assoc()){?>
            //  <option value="<?= $rs['code']?>"><?php echo $rs['code'] ?></option>
            <?php  }  
            ?>
 </select>


