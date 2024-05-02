<?php
include('./header.php');
require('./database.php');
?> <table    class="table table-striped"  >
 <thead>
<?php
$query='SHOW TABLES FROM labvision';
$results=mysqli_query($sqlconnect,'SHOW COLUMNS FROM create_users');
while ($fieldInfo = mysqli_fetch_array($results)) { ?>

      <th class=" fs-6 fw-medium"><?php echo $fieldInfo[0] ?></th>
   
 

 <?php } ?>
 </thead>
</table>