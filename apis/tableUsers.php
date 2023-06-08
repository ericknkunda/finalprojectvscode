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
$code = $_POST['code'];

$insertQuerry =$conn->prepare("insert into fp_tbl_user(user_name, phone, email_address, gender, age_range, code, code_status) 
values('".$userName."', '".$phoneAddress."', '".$emailAddress."', '".$userGender."','".$userAgeRange."','".$code."', 1);");
$insertQuerry->execute();
if($insertQuerry){
    echo"inserted \n";
    echo json_encode(array("user_name"=>$userName,"phone"=>$phoneAddress,"email"=>$emailAddress,"usersgender"=>$userGender,"userAge"=>$userAgeRange));

}
else{
    echo json_encode(array("Error"=>"omething went wrong"));
}

//$conn->close;
?>