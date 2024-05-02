<?php
require ('./database.php');
  $lab= $_GET['lab'];
    $class= $_GET['class'];
    ?>


  <select name="range[]" id="code" class= form-control multiple  style="height:300px;overflow-y:scroll" >
    
 <?php  $sql1 = "SELECT code from codes where laboratory = '$lab' and classifications = '$class' order by code ";
                    $quey1 = mysqli_query($sqlconnect,$sql1);
              
                  while($rs = $quey1->fetch_assoc()){?>
            //  <option value="<?= $rs['code']?>"><?php echo $rs['code'] ?></option>
            <?php  }  
            ?>
 </select>


