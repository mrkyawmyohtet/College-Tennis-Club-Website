<?php
    include('../AdminSide/connection.php');
    if(isset($_GET['eid'])){
        $eid = $_GET['eid'];
        $query = "DELETE FROM eventtable WHERE eventID = '$eid'";
        mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: eventtable.php');
        exit();
    }
    else{
        echo "EventID to delete is not received!";
    }
?>