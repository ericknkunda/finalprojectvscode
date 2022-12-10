<?php
require_once("../../finalproject/db_connection.php");
$registeresUsers =$conn->prepare("select *from tbl_user");
$registeresUsers->execute();
while($user=$registeresUsers->fetch()){
    $users[]=array("registration_id"=>$user['registration_id'], "user_name"=>$user['user_name'],"phone"=>$user['phone']
,"email_address"=>$user['email_address'],"gender"=>$user['gender'], "age_range"=>$user['age_range']);
}
echo json_encode($users);

?>