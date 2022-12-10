<?php
$user ="root";
$password="";
$host="localhost";
$db_name="final_year_project";

$conn = new PDO( 'mysql:host=localhost;dbname=final_year_project', $user, $password );
if(!$conn){
    echo'not connected to '.$db_name."\n";
}

?>