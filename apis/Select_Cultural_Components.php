<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json; charset=UF-8');
// header('Access-Control-Allow-Methods:POST');
// header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content_type,Access-Control-Allow-Methods,
// Authorization,X-Requested-With');
require_once ("../../finalproject/db_connection.php");

$components=array();
$selectCat =$conn->prepare("select classification_id, classification_name from cultural_components_classification");
$selectCat->execute();
$counter =$selectCat->rowCount();
// if($counter>0){
//     //echo "successfully \n";
// }
while($componentsArray=$selectCat->fetch()){
    $components[]=array("classification_id"=>$componentsArray['classification_id'], 
    "classification_name"=>$componentsArray['classification_name']);
}
//echo "\n";

echo json_encode($components);

?>