<?php
require_once("../../finalproject/db_connection.php");
$profileDb =$conn->prepare("select profile_id from fp_user_profile where profile_id=
(select max(profile_id) from fp_user_profile)");
$profileDb->execute();
while($fetch=$profileDb->fetch()){
    $userProfile[]=array("profile_id"=>$fetch['profile_id']);
}
echo json_encode($userProfile);
?>