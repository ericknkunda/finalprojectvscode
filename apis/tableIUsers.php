<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json; charset=UF-8');
// header('Access-Control-Allow-Methods:POST');
// header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_type,Access-Control-Allow-Methods,
// Authorization,X-Requested-With');
require_once ("../../finalproject/db_connection.php");
//require_once 'db_connection.php';
$userName =$_REQUEST["user_name"];
$phoneAddress=$_REQUEST["phone"];
$emailAddress =$_REQUEST["email_address"];
$userGender =$_REQUEST["gender"];
$userAgeRange =$_REQUEST["age_range"];
$insertQuerry ="insert into tbl_user(user_name, phone, email_address, gender, age_range) 
values('".$userName."', '".$phoneAddress."', '".$emailAddress."', '".$userGender."','".$userAgeRange."');";
$insert=$conn->prepare($insertQuerry);
$insert->execute();
if($insert){
    //echo"inserted \n";
    echo json_encode(array("usernsme"=>$userName,"phone"=>$phoneAddress,"email"=>$emailAddress,"usersgender"=>$userGender,"userAge"=>$userAgeRange));

}
else{
    echo"something went wrong<br>";
}

$conn=null;
?>