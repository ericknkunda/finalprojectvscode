<?php
$user ="root";
$password="";
$host="localhost";
$db_name="final_year_project";
// $conn = new PDO('mysql:host=173.254.56.16;dbname=haub1_demo;charset=utf8', 'haub1_demo','M00dle@2020');

$conn = new PDO( 'mysql:host=localhost;dbname=final_year_project', $user, $password );
if(!$conn){
    echo 'not connected to '.$db_name."\n";
}

?>