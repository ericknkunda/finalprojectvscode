<?php
require_once("../../finalproject/db_connection.php");
    $registration =$_REQUEST['registration_id'];
    $date=date('Y:m:d H:i:s');
    $saveProfile =$conn->prepare("insert into fp_user_profile (registration_id, registration_date) 
    values('".$registration."', '".$date."');");
    $saveProfile->execute();
    $profileArray[]=array("Regidtration_id"=>$registration, "Registration_date"=>$date);
    if($saveProfile){
        echo json_encode($profileArray);
    }
    else{
        echo json_encode(array("Error"=>"Insertion fail"));
    }

?>