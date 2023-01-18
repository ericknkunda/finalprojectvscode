<?php
require_once("../../finalproject/db_connection.php");

//selecting the last verification code
$selectLastVerCode =$conn->prepare("select code from fp_tbl_user where registration_id =
(select max(registration_id) from fp_tbl_user) and code_status =1");
$selectLastVerCode->execute();
while($fetch =$selectLastVerCode->fetch()){
    $jsonArray[]= array("Code"=>$fetch['code']);
}
echo json_encode($jsonArray);
?>