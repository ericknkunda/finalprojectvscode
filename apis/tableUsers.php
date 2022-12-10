<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UF-8');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
require_once ("../../finalproject/db_connection.php");
//require_once 'db_connection.php';
$userName =$_POST['user_name'];
$phoneAddress=$_POST['phone'];
$emailAddress =$_POST['email_address'];
$userGender =$_POST['gender'];
$userAgeRange =$_POST['age_range'];
$insertQuerry =$conn->prepare("insert into tbl_user(user_name, phone, email_address, gender, age_range) 
values('".$userName."', '".$phoneAddress."', '".$emailAddress."', '".$userGender."','".$userAgeRange."');");
$insertQuerry->execute();
if($insertQuerry){
    echo"inserted \n";
    echo json_encode(array("user_name"=>$userName,"phone"=>$phoneAddress,"email"=>$emailAddress,"usersgender"=>$userGender,"userAge"=>$userAgeRange));

}
else{
    echo"something went wrong<br>";
}

//$conn->close;
?>