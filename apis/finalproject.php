<?php
include '../../finalproject/db_connection.php';
$dataset_phone =$_POST["datasetphone"];
$dataset_names =$_POST["datasetnames"];

//checking for duplication
$isInserted =$conn->prepare("select *from project_users_data_set where dataset_phone='".$dataset_phone."'");
$isInserted->execute();
$checkDupluication=$isInserted->fetch();
    if($isInserted->rowCount()<1){
        $createASet =$conn->prepare("insert into  project_users_data_set(dataset_phone, dataset_names)
        values ('".$dataset_phone."', '".$dataset_names."')");
        $createASet->execute();
        if($createASet){
            echo json_encode(array('dataset_phone'=>$dataset_phone, 'dataset_names'=>$dataset_names));
            echo'<meta http-equiv="refresh"'.'content="1;URL=login.php">';
        }

    }
    else{
        echo '<script>
        confirm("User Arleady exist")
        </script>';
        echo'<meta http-equiv="refresh"'.'content="1;URL=login.php">';

    }

?>