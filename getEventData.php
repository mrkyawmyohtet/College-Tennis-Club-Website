<?php
    include('../AdminSide/connection.php');
    if(isset($_GET['eid'])){
        $eid = $_GET['eid'];
        $query = "select * from eventtable where eventID = '$eid'";
        $result = mysqli_query($connect, $query);
        if($row = mysqli_fetch_assoc($result)){
            echo json_encode($row);
        }
    }
?>