<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UF-8');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
require_once ("../../finalproject/db_connection.php");
//require_once 'db_connection.php';
$userName =$_REQUEST["user_name"];
$phoneAddress=$_REQUEST["phone"];
$emailAddress =$_REQUEST["email_address"];
$userGender =$_REQUEST["gender"];
$userAgeRange =$_REQUEST["age_range"];
$code = $_REQUEST['code'];

$data=array(
    "sender"=>'+250780674459',
    "recipients"=>$phoneAddress,
    "message"=>"your confirmation code is: ".$code,
  );
  $url="https://www.intouchsms.co.rw/api/sendsms/.json";
  $data=http_build_query($data);
  $username="julesntare";
  $password="ju.jo.123.its";

  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  $result=curl_exec($ch);
  $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
  curl_close($ch);

    if($httpcode == 200) {
    $insertQuerry ="insert into tbl_user(user_name, phone, email_address, gender, age_range, code, code_status) 
    values('".$userName."', '".$phoneAddress."', '".$emailAddress."', '".$userGender."','".$userAgeRange."','".$code."','1');";
    $insert=$conn->prepare($insertQuerry);
    $insert->execute();
    if($insert){
        //echo"inserted \n";
        echo json_encode(array("username"=>$userName,"phone"=>$phoneAddress,"email"=>$emailAddress,"usersgender"=>$userGender,"userAge"=>$userAgeRange,"code"=>$code,"code_status"=>1));

}
else{
    echo"something went wrong<br>";
}
               }

$conn=null;
?>