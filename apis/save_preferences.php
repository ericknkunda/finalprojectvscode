<?php
require_once("../../finalproject/db_connection.php");
$profileId=$_REQUEST['profile_id'];
$itemClass =(array)$_REQUEST['item_class'];
$date =date('Y:m:d H:i:s');
foreach($itemClass as $item) {
$recordPref =$conn->prepare("insert into profile_preferences(profile_id, item_class, date_of_addition)
values('".$profileId."', '".$item."', '".$date."')");
$recordPref->execute();
}
$preferenceArray[]=array("profile_id"=>$profileId, "item_class"=>$itemClass, "date_of_addition"=>$date);
if($recordPref){
    echo json_encode($preferenceArray);
}
else{
    echo json_encode(array("Error"=>"Error occured"));
}


// // Connect to the database using PDO
// $conn = new PDO("mysql:host=your-host-name;dbname=your-database-name", "username", "password");

// Create an array to hold the values for each row of data
// $values = array();

// // Loop through the data sent in the request and construct
// // the values for each row of data
// foreach ($_POST as $key => $value) {
//     // Split the key into the row and column for the value
//     $keyParts = explode("-", $key);
//     $row = $keyParts[0];
//     $col = $keyParts[1];

//     // Add the value to the array for the corresponding row
//     $values[$row][$col] = $value;
// }

// // Construct the SQL query to insert the data
// $sql = "INSERT INTO profile_preferences(profile_id, item_class, date_of_addition) VALUES ";

// // Add each row of data to the query
// foreach ($values as $row) {
//     $sql .= "('" . $row["profile_id"] . "', '" . $row["item_class"] . "', '".$date."')";
// }

// // Remove the trailing comma and add a semicolon to end the query
// $sql = rtrim($sql, ",") . ";";

// // Prepare the query for execution
// $stmt = $conn->prepare($sql);

// // Execute the query
// //echo "my name";
// $stmt->execute();
// $preferenceArray[]=array("profile_id"=>$profileId, "item_class"=>$itemClass, "date_of_addition"=>$date);
// if($recordPref){
//     echo json_encode($preferenceArray);
// }
// else{
//     echo json_encode(array("Error"=>"Error occured"));
// }

?>