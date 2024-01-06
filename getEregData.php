<?php
    include('../AdminSide/connection.php');
    if(isset($_GET['rid'])){
        $rid = $_GET['rid'];
        $query = "SELECT * FROM eventregister WHERE RegID = '$rid'";
        $result = mysqli_query($connect, $query);
        if($row = mysqli_fetch_assoc($result)){
            echo json_encode($row);
        }
    }
?>