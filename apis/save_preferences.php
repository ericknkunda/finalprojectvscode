<?php
require_once("../../finalproject/db_connection.php");
$profileId=$_REQUEST['profile_id'];
$itemClass =$_REQUEST['item_class'];
$date =date('Y:m:d H:i:s');
$recordPref =$conn->prepare("insert into profile_preferences(profile_id, item_class, date_of_addition)
values('".$profileId."', '".$itemClass."', '".$date."')");
$recordPref->execute();
$preferenceArray[]=array("profile_id"=>$profileId, "item_class"=>$itemClass, "date_of_addition"=>$date);
if($recordPref){
    echo json_encode($preferenceArray);
}
else{
    echo json_encode(array("Error"=>"Error occured"));
}
?>