
<?php 
session_start();
require("./database.php");
if (empty($_POST['key'])) {
   $_SESSION['status'] ="Select First!";
   header('location: management.php');
} else

if(isset($_POST['delete'])){
   $date = date("Y-m-d");
 for($i = 0; $i<count($_POST['key']);$i++){
    $key = $_POST['key'][$i];
    $query = "Delete From create_users WHERE unique_id = $key";
    $sqlquery = mysqli_query($sqlconnect,$query);
    $_SESSION['status'] = "Delete Success!";
    header('location: management.php');
}
}elseif(isset($_POST['update'])){
   $date = date("Y-m-d");

 for($i = 0; $i<count($_POST['key']);$i++){
    $key = $_POST['key'][$i];
   $fname  = $_POST['firstname_'.$key];
   $Mname  = $_POST['middle_'.$key];
   $Lname  = $_POST['lastname_'.$key];
   $Uname  = $_POST['user_'.$key];
   $email  = $_POST['email_'.$key];
   $pass  = $_POST['password_'.$key];
   $type  = $_POST['type_'.$key];

   $body = 
   'Date:'.$date.'
   
       
   Good Day, Maam/Sir: '.$Lname.'!
        
   Attached here are the credentials of your DYCI
   LabVISION Account. Your Account is Sucessfully
   Update.
                
   LabVISION username: '.$Uname.'
   Password: '.$pass.'
   
   Please be guided accordingly,
   Thank you.
   
   Regards,
   LVS Team
   ';
       $url = "https://script.google.com/macros/s/AKfycbxD8fq3r2I8tFT9NFbkIq75LyjjabcHOhmT5NSndo84t2aZR4SVyisekVqyMkcpkI4jRA/exec";
               $ch = curl_init($url);
               curl_setopt_array($ch, [
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_POSTFIELDS => http_build_query([
                     "recipient" => $email,
                     "subject"   =>'Update Credential',
                     "body"      => $body,
                     "from"       => 'Labvision'
                  ])
               ]);
                $result = curl_exec($ch);
       if($result){
         $query="UPDATE create_users SET first_name = '$fname' ,middle_name = '$Mname', last_name ='$Lname', user_name = '$Uname',email_address ='$email',password='$pass',type = '$type' WHERE unique_id = $key;";
         $sqlquery = mysqli_query($sqlconnect , $query);
 
         if ($sqlquery){
            $_SESSION['status'] ="Update Successfull!";
            header('location: management.php');
         } else{
            echo ('failed');
            }
       } else{
          $_SESSION['status'] ="Update Failed";
          header('location: management.php');
       }
 

      }
}
?>
