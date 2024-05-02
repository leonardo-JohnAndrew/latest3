<?php 
session_start();
 require('./database.php');
 $pwd = $_SESSION['password'];
 
 
if(isset($_GET['submit_faculty'])){
  $name = $_SESSION['name'] ;
   $class  = $_GET['unit_class'];
   $no_units = $_GET['number_of_units'];
   $office = $_GET['office'];
   $purpose = $_GET['purpose'];

   if($class == 'Other'){
    $class = $_GET['other_unit_class'];
   }
   if($office  =='Other'){
     $office = $_GET['other_office'];
   }
 
   $sql = " INSERT into unit_request (classification,no_units,request_by,office,purpose,date_time_requested)values('$class' ,$no_units, '$name','$office', '$purpose',now())";
   $sqlquery = mysqli_query($sqlconnect,$sql);
   if($sqlquery){
    $_SESSION['status'] ="Request Form Submit  Success!";
      header('location: faculty.php');
   }
  
  }
  if(isset($_POST['report'])){
     $name = $_POST['name'];
     $class = $_POST['equip'];
     $lab = $_POST['lab'];
    $prob = $_POST['prob'];

    foreach( $_POST['range'] as $code){
          $queryreport =  "INSERT into report(laboratory,Classifications,code,name )values('$lab','$class','$code','$name')";
          $sqlreport =mysqli_query($sqlconnect,$queryreport);

    }
          if($sqlreport){
            $queryreport =  "INSERT into unit_reports (laboratory,classification,problem,date_report,reported_by)values('$lab','$class','$prob', now(),'$name')";
            $sqlreport =mysqli_query($sqlconnect,$queryreport);
            if($sqlreport){
              $_SESSION['status'] ="Report Form Submit  Success!";
                 header('location: equipreport.php');
            }else{
                  echo "error";
            }
          }else {
            echo "error insert";
          }

    
  //   $sql = " INSERT into unit_reports (classification,unit_code,problem,date_report,reported_by,laboratory)
  //   VALUES('$class',(SELECT concat(code,'-','$lab','-','$no') from inventory where No = $no ),'$prob',now(),'$name','$lab');";
  //   $sqlquery = mysqli_query($sqlconnect,$sql);
  //   if($sqlquery) {
  //     $_SESSION['status'] ="Report Form Submit  Success!";
  //     header('location: equipreport.php');
  //   }
     
  // }
  // if(isset($_GET['Xamp'])){
  //   foreach($_GET['range'] as $select){
  //     echo $select;
  //   }
  //   echo $_GET['name'];
  
   
   
  }

  if(isset($_GET['submit_request'])){
    $lab = $_GET['labname'];
    $name = $_GET['name'];
    $id=  $_GET['id'];
    $class = $_GET['classname'];
    $remark = $_GET['remark'];
    $pass = $_GET['pass'];
 

   // echo $lab.$class.$name.$pass.$id.$remark;
    if(empty($_GET['range'])){
      if($pwd == $pass){
        if($remark !='Approved'){
          if(!empty($remark)){
        $sql = "UPDATE unit_request set remarks = '$remark',received = now() where No= '$id'";
        $sqlq = mysqli_query($sqlconnect,$sql);
   if(!$sqlq){
        echo "error update";
   }else 
        $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Request',  '$name' ,'$remark','$lab $class ')";
      $sqlre =  mysqli_query($sqlconnect,$queryre);
      if($sqlre){

        $_SESSION['status'] = "Submit!";
        header('location: unitrequest.php');

      }else {
        echo "error";
      }
     
          }else{
            $_SESSION['status'] = "Assign Remarks First";
            header('location: unitrequest.php');
          }
        }else{
          $_SESSION['status'] = "You Select Approved You must assign codes";
          header('location: unitrequest.php');
        } 
      }else{
        $_SESSION['status'] = "Invalid password ";
        header('location: unitrequest.php');
      }
    }else{
      $count = count($_GET['range']);
  if($pwd == $pass){
    if($remark == 'Approved'){
    foreach($_GET['range'] as $select){
      $sql = "INSERT INTO barrowed (no_id,classifications,code,name,laboratory) values('$id','$class','$select','$name','$lab')  ";
      $sqlquery = mysqli_query($sqlconnect,$sql);
      if($sqlquery){
           $sql4 = "DELETE from codes where code = '$select' ";
           $sqlq4 =mysqli_query($sqlconnect,$sql4);
           if($sqlq4){
           
          $sql1 ="UPDATE unit_request set remarks = '$remark' ,received = now() where No = '$id' ";
          $sqlq = mysqli_query($sqlconnect,$sql1);
          if($sqlq){
            $sql5 ="SELECT count(no) as count from codes where classifications = '$class' and laboratory = '$lab'";
            $sql5q = mysqli_query($sqlconnect,$sql5);
            while($rs =$sql5q->fetch_assoc()){
                $ct = $rs['count'];
            }
            $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Borrowed',  '$name' ,'$remark','$lab $class $count')";
            $sqlre =  mysqli_query($sqlconnect,$queryre);
             $query  = "SELECT  $lab from equipment where Classifications = '$class'";
             $sqlquer = mysqli_query($sqlconnect,$query);
             while($rs = $sqlquer->fetch_assoc()){
              $num = $rs["$lab"];

              $_SESSION['status'] = "Submit! $ct $class left in $lab Initial Count $num ";
            header('location: unitrequest.php');
             }
          
          }else{
            echo "error2";
          }
        } else{
           echo "error1";
        }
      }else{
        echo "error";
      }
    }
    
  } else{
    $sql = "UPDATE unit_request set remarks = '$remark' , received = now()  where No = '$id'";
    $sqlq = mysqli_query($sqlconnect,$sql);
if(!$sqlq){
 echo "error";
}else
    $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Request',  '$name' ,'$remark','$lab $class $count')";
    $sqlre =  mysqli_query($sqlconnect,$queryre);
    if($sqlre){

      $_SESSION['status'] = "Submit!";
      header('location: unitrequest.php');

    }else {
      echo "error";
    }
  }

  }else {
    $_SESSION['status'] = "Invalid password ";
    header('location: unitrequest.php');
  }
  
  }

  //   if (empty($_GET['key'])) {
  //     $_SESSION['status'] ="Select First!";
  //     header('location: unitrequest.php');
  //  } else
  //   $date = date('Y-m-d');
  //   for($i = 0; $i<count($_GET['key']);$i++){

  //     $key = $_GET['key'][$i];
  //    $class  = $_GET['class_'.$key];
  //   //  $num = $_GET['num_'.$key][$i];
  //    $name = $_GET['name_'.$key];
  //    $remark  = $_GET['remark_'.$key];
  //    $code  = $_GET['code_'.$key];
  //    $recieved = $_GET['received_'.$key];
  //   echo $key.$class.$name.$remark.$code;
 
      
  //     $sql =  "UPDATE unit_request Set remarks = '$remark', unit_code = '$code', received = now(),returned = now()
  //          where no = $key;";
  //       $sqlquery = mysqli_query($sqlconnect,$sql);
      
  //       $sql1 = "INSERT into Recent VALUES('$code','Barrowed','$name','$remark')";
  //       $query = mysqli_query($sqlconnect,$sql1);
  //       if($query){
  //         $_SESSION['status'] = "Submit!";
  //         header('location: unitrequest.php');
  //       } 
  //     }
}
if(isset($_POST['submit_report'])){
 $id = $_POST['id'];
 $pass =$_POST['pass'];
 $remark = $_POST['remark'];
 $class = $_POST['classname'];
$lab = $_POST['lab'];
 $name = $_POST['rename'];
 
if($pwd == $pass){
    if(empty($_POST['codes'])){
      $_SESSION['status'] = "Select Code First";
      header('location: reports.php');
    }else {
         $count = count($_POST['codes']);
             foreach($_POST['codes'] as $select){
              echo $select;
            
          if($remark != 'Fixed'){
              //delete to code tb
        
            $query = "DELETE from codes where code =  '$select'";
            $sqlquery  = mysqli_query($sqlconnect,$query);
            $queryreport = "INSERT into report (name, Classifications,code,remark,laboratory) values ('$name','$class','$select','$remark','$lab')";
            $sqlreport = mysqli_query($sqlconnect,$queryreport);
            
            if($sqlreport){
                    $query1 = "SELECT * FROM codes where classifications = '$class' and laboratory = '$lab'";
                    $sqlquery1 = mysqli_query($sqlconnect,$query1);
                    $result = mysqli_num_rows($sqlquery1);
                   $query4 = "UPDATE unit_reports set remarks = '$remark' where No = $id";
                   $sqlquery4  = mysqli_query($sqlconnect, $query4);
                    if($sqlquery4){
                       
                       $query2 ="INSERT into recent (Transaction,name,action,equipment) values('Report','$name','$remark','$lab $class $count')";
                       $sql2 = mysqli_query($sqlconnect,$query2);

                        if($sql2){
                             $query3 = "SELECT $lab from equipment where classifications = '$class'"; 
                             $sql3 = mysqli_query($sqlconnect,$query3);
                             while($rs = $sql3->fetch_assoc()){
                                  $initial = $rs["$lab"];
                              $_SESSION['status'] = "  $count   $class $remark  in $lab $result $class left Initial Count : $initial";
                              header('location: reports.php');
                             }
                        } else{
                          echo "error";
                        }
                    }else{
                      echo "error";
                    }
            }else {
              echo "error delete";
            }
          }else {
        
             $querycode = "UPDATE unit_reports set remarks = '$remark' where No = $id";
            $sqlquery = mysqli_query($sqlconnect,$querycode);
           
            if($sqlquery){
              $_SESSION['status'] = "Respond submit success";
              header('location: reports.php');
            }else{
              echo "error Update";
            }
          }
        
        
             }
    }

}else{
  
$_SESSION['status'] = "Invalid password";
header('location: reports.php');
}

} 
if(isset($_GET['return'])){
  $id = $_GET['id'];
  $lab = $_GET['lab'];
  $class= $_GET['class'];
  $pass= $_GET['pass'];
  $name = $_GET['rename'];
 
  if($pwd == $pass){
  if(empty($_GET['range'])){
    $_SESSION['status'] = "Select Code First";
    header('location: adminbarrowed.php');
    
  }else{
     $count = count($_GET['range']);
        foreach($_GET['range'] as $select){
       
          $sql3 = "INSERT into codes (classifications,code,laboratory) values ('$class','$select','$lab')";
          $sqlq3  =mysqli_query($sqlconnect,$sql3);
        if($sql3){
          $sql = "UPDATE   barrowed set remark = 'return' where code ='$select'";
          $sqlquery = mysqli_query($sqlconnect,$sql);
        }
        }
        if($sqlquery){
          
       $sql2 = "SELECT code from barrowed where no_id = '$id' and  remark is null";
       $sqlq2 = mysqli_query($sqlconnect,$sql2);
       if(mysqli_num_rows($sqlq2)>0){
        
        $sql3 ="UPDATE unit_request set returned= now() where No = '$id'";
        $sqlq3 = mysqli_query($sqlconnect,$sql3);
       if($sqlq3){
        $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Returned',  '$name' ,'$remark','$lab $class ')";
        $sqlre =  mysqli_query($sqlconnect,$queryre);
        if($sqlre){
             
          $sql5 ="SELECT count(no) as count from codes where classifications = '$class' and laboratory = '$lab'";
          $sql5q = mysqli_query($sqlconnect,$sql5);
          while($rs =$sql5q->fetch_assoc()){
              $ct = $rs['count'];
          }
          $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Borrow',  '$name' ,'Returned','$lab $class $count')";
          $sqlre =  mysqli_query($sqlconnect,$queryre);
           $query  = "SELECT  $lab from equipment where Classifications = '$class'";
           $sqlquer = mysqli_query($sqlconnect,$query);
           while($rs = $sqlquer->fetch_assoc()){
            $num = $rs["$lab"];
  
            $_SESSION['status'] = "Submit! $ct $class in $lab Initial Count $num  ";
          header('location: adminbarrowed.php');
           }
          }
        }

       }else{
          $sql3 ="UPDATE unit_request set returned= now() ,remarks = 'Return' where No = '$id'";
          $sqlq3 = mysqli_query($sqlconnect,$sql3);
         if($sqlq3){
         
               
            $sql5 ="SELECT count(no) as count from codes where classifications = '$class' and laboratory = '$lab'";
            $sql5q = mysqli_query($sqlconnect,$sql5);
            while($rs =$sql5q->fetch_assoc()){
                $ct = $rs['count'];
            }
            $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Borrow',  '$name' ,'Returned All','$lab $class $count')";
            $sqlre =  mysqli_query($sqlconnect,$queryre);
             $query  = "SELECT  $lab from equipment where Classifications = '$class'";
             $sqlquer = mysqli_query($sqlconnect,$query);
             while($rs = $sqlquer->fetch_assoc()){
              $num = $rs["$lab"];
    
              $_SESSION['status'] = "Submit! $ct $class in $lab Initial Count $num Successfully Returned all";
            header('location: adminbarrowed.php');
             }
          }else {
            echo "error";
          
         }
       }
      }else {
       echo "error";
      }
  }
}else{
  $_SESSION['status'] = "Invalid password";
  header('location: adminbarrowed.php');
}

}
if(isset($_POST['fixed'])){
  $id = $_POST['id'];
  $pass = $_POST['pass'];
 $date = $_POST['dates'];
 $class =$_POST['class'];
 $lab =$_POST['lab'];
// $code =$_POST['code'];
 $name =$_POST['name'];
  if(empty($pass)&&$pass!=$pwd){
    $_SESSION['status'] = "Invalid Password";
    header('location: adminreportlist.php');
    
   }else{
    if(empty($_POST['codes'])){
      $_SESSION['status'] = "Select Code First";
      header('location: adminreportlist.php');
    }else{
      $count= count($_POST['codes']);
    foreach($_POST['codes'] as $select){
    
     
    if($pass == $pwd){
      // DELETE 
          $querydel = "UPDATE report set remark = 'Fixed' where code = '$select'";
          $sqldel = mysqli_query($sqlconnect,$querydel);
          if($sqldel){
            $querysel = "SELECT  code from report where name = '$name' and laboratory = '$lab' and remark != 'Fixed' or remark is null ";
            $sqlsel = mysqli_query($sqlconnect,$querysel);
            if(mysqli_num_rows($sqlsel)>0){
              $queryupdate = "UPDATE unit_reports  set remarks = 'Fixed $count'  where laboratory = '$lab'";
              $sqlupdate = mysqli_query($sqlconnect,$queryupdate);         
               }else{
                $queryupdate = "UPDATE unit_reports  set remarks = 'Fixed'  where laboratory = '$lab'";
                $sqlupdate = mysqli_query($sqlconnect,$queryupdate);
                
               }
               
          }else{
            echo "error delete";
          }
         /// update remarks
         if($sqlupdate){
          $sql3 = "INSERT into codes (classifications,code,laboratory) values ('$class','$select','$lab')";
          $sqlq3  =mysqli_query($sqlconnect,$sql3);
            if($sqlq3){
              $queryre = "INSERT into recent (Transaction,name, action, equipment) values('Report',  '$name' ,'Fixed','$lab  $class $count')";
              $sqlre =  mysqli_query($sqlconnect,$queryre);

              $sql5 ="SELECT count(no) as count from codes where classifications = '$class' and laboratory = '$lab'";
              $sql5q = mysqli_query($sqlconnect,$sql5);
              while($rs =$sql5q->fetch_assoc()){
                  $ct = $rs['count'];
              }
              $_SESSION['status'] = "Success Submit $count $class initial count $ct in $lab ";
              header('location: adminreportlist.php');
              
            }else{
                 echo "error insert";
            }
         }else {
          echo "error update";
         }
    }else {
      $_SESSION['status'] = "Invalid Password";
      header('location: adminreportlist.php');
      
    }
  }
  }

   }
}
  
?>
