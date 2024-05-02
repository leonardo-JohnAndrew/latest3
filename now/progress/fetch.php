<?php
require('./database.php');
if(isset($_POST['view'])){
    
    $query = "SELECT * from create_users order by unique_id desc limit 5";
    $result = mysqli_query($sqlconnect,$query);
    if(mysqli_num_rows($result)>0){
       while($row = mysqli_fetch_array($result)){
      
       $query1 ="SELECT * from create_users where unique_id<10";
       $rs = mysqli_query($sqlconnect,$query1);
       $count = mysqli_num_rows($rs);
       $data =array(
                'notification' => "<li>
                <a href=''>".
                    "<strong>".$result['last_name']."</strong>
                    <h5>".$result['email_address']."</h5>
                </a>
            </li>",
            'unseen_notification' => $count
       ); 
       echo json_encode($data);
       }
    }
      else{

      }
     
}

?>
