<?php
require_once("../../finalproject/db_connection.php");
$useritems =$conn->prepare("select max(registration_id)as registration from fp_tbl_user");
$useritems->execute();
while($fetch=$useritems->fetch()){

    $userProfile =$conn->prepare("select *from fp_user_profile where registration_id =
    '".$fetch['registration']."'");
    $userProfile->execute();
    $theProfile =$userProfile->fetch();

    $preferencesSet =$conn->prepare("select *from fp_profile_preferences where profile_id =
    '".$theProfile['profile_id']."'");
    $preferencesSet->execute();
    while($thePreferences =$preferencesSet->execute()){
        $profilePreferences[]=array("Items "=>$thePreferences['item_class']);
    }
    }  

echo json_encode($profilePreferences);
?>