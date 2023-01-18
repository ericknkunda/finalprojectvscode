<?php
require_once("../../finalproject/db_connection.php");
$select =$conn->prepare("select registration_id from fp_tbl_user where registration_id =
(select max(registration_id) from fp_tbl_user)");
$select->execute();
//$components[];
while($fetch=$select->fetch()){
    $components[]=array("registration_id"=>$fetch['registration_id']);
}
echo json_encode($components);
?>
