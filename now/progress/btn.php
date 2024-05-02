<?php 
require('./database.php');
session_start();
//  $class = $_SESSION['class'] ;

// $lab = $_SESSION['lab'];
// $ccount = count($class);
// $lcount = count($lab);

if(isset($_POST['submit'])){

$class = $_POST['class'];
$no = ($_POST['no']);
$lab = $_POST['lab'];
 
$query1= "SELECT  $lab from inventory where Classifications = '$class'"; 
$sqlquery1 = mysqli_query($sqlconnect,$query1);
while ($rs = $sqlquery1->fetch_assoc()){
     $code[] = $rs["$lab"];
}
 

$query = "SELECT $lab from equipment where Classifications = '$class'";
$sql = mysqli_query($sqlconnect,$query);
while ($rs = $sql->fetch_assoc()) {
      $max[] = $rs["$lab"];
}

$counter =($max[0]+$no) ;

for($i = $max[0]+1;$i<=$counter;$i++){
  if($i <10){
    $codes = $code[0]."-0".$i;
  }else {
    $codes = $code[0]."-".$i;
  }
  $query2 = "UPDATE equipment set $lab = $counter where Classifications = '$class'";
  $sqlquery2 = mysqli_query($sqlconnect,$query2);
  if($sqlquery2){
     $query3 = "INSERT into codes (classifications,code,laboratory) value('$class','$codes','$lab')";
     $sql3 = mysqli_query($sqlconnect,$query3);
     if($sql3){
      $_SESSION['status'] = "Success Add $no : $counter $class in $lab";
      header('location:laboratory.php');
     }else{
       echo "error insert";
     }
  }else{
    echo "error update " ; 
   }
 }

  // for($r=1;$r<=$ccount; $r++){
  //   $cname = $_POST["class"][$s];
  //     for($i=0; $i<$lcount;$i++){
  //       $name = $lab[$i];
  //       $val = $_POST["$r"][$i];
  //       $sql = "UPDATE equipment set $name = $val  Where No = $r";
  //       $sqlquery = mysqli_query($sqlconnect ,$sql);
  //       if($sqlquery){
  //           $_SESSION['status'] ="Update Successfull!";
  //           header('location: laboratory.php');
  //       }
  //     }
          

  //    }
  
 }
if(isset($_POST['delete'])){
$lab =$_POST['lab'];
$class = $_POST['class'];
if(empty($_POST['range'])){
      $_SESSION['status'] = "Select Code First";
      header('location:laboratory.php');
}else{

$query = "SELECT $lab from equipment where Classifications = '$class'";
$sql = mysqli_query($sqlconnect,$query);
while ($rs = $sql->fetch_assoc()) {
      $max[] = $rs["$lab"];
}
$count = count($_POST['range']);
$sub = ($max[0]-$count);
///updating

$queryup = "UPDATE equipment set $lab = $sub  where Classifications= '$class'";
$sqlup = mysqli_query($sqlconnect,$queryup);

if(!$sqlup){
  echo "error update";
}else{
foreach ($_POST['range'] as $code ) {
 //delete
   $querydel = "DELETE from codes  where code ='$code'";
   $sqldel = mysqli_query($sqlconnect,$querydel);
   if($sqldel){
    $_SESSION['status'] = "Success Delete $count: $sub $class in $lab ";
    header('location:laboratory.php');
   }else{
      echo "error delete";
   }
 }
}
}
}

if(isset($_POST['addclass'])){
  $class = $_POST['class'];
  $lab  = $_POST['lab'];
  $no = $_POST['no'];

  // create a code
  $querysel  = "SELECT Classifications  from inventory ";
  $sqlsel = mysqli_query($sqlconnect,$querysel);
  $max = mysqli_num_rows($sqlsel)+1;
 $incode  = "E-"."0$max";

 //adding to  equipment
 $queryadd ="INSERT into  equipment(Classifications, $lab) values('$class','$no')";
 $sqladd = mysqli_query($sqlconnect,$queryadd);
//insert to inventory 
if($sqladd){
    $queryin = "INSERT into inventory (Classifications , code, ITLAB, SPARK,PRIME,FELTA,INSPIRE)values('$class','$incode','$incode-ITLAB','$incode-SPARK','$incode-PRIME','$incode-FELTA','$incode-INSPIRE')"  ;
    $sqlin = mysqli_query($sqlconnect,$queryin);
    //creation of code
    if($sqlin){
      for($i = 1;$i<=$no; $i++){
        if($i<10){
           $code  = $incode."-$lab-0$i";
        } else{
         $code  = $incode."-$lab-$i";
         }
        $querycode = "INSERT INTO codes (classifications,code,laboratory)values('$class','$code','$lab')";
        $sqlcode = mysqli_query($sqlconnect,$querycode);
        }
        //print final output
        if($sqlcode){
          $_SESSION['status'] = "Success Add $no $class in $lab";
          header('location:codes.php');
        }else{
          echo "error insertion";
        }
    }else{
      echo "error add";
    }
}else{
  echo "Error insert";
}


}

if(isset($_POST['deleteclass'])){
  $class = $_POST['class'];
  // delete to inventory
    $queryin = "DELETE FROM inventory where Classifications = '$class'";
    $sqlin = mysqli_query($sqlconnect,$queryin);
  //delete to equipment
  if($sqlin){
    $queryequip = "DELETE FROM equipment where Classifications = '$class'";
    $sqlequip= mysqli_query($sqlconnect,$queryequip);
    //delete codes
    if($sqlequip){
      $querycode = "DELETE FROM codes where classifications = '$class'";
      $sqlcode = mysqli_query($sqlconnect,$querycode);
      if($sqlcode){
        $_SESSION['status'] = "Success Delete $class ";
        header('location:codes.php');
      }else{
         echo "error";
      }
    }else{
      echo "error delete";
    }
  }else{
    echo "error delete";
  }


}
?>
 