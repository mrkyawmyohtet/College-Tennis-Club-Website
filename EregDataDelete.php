<?php
    include('../AdminSide/connection.php');
    if(isset($_GET['rid'])){
        $rid = $_GET['rid'];
        $query = "DELETE FROM eventregister WHERE RegID = '$rid'";
        $result = mysqli_query($connect, $query);
        if($result){
            mysqli_close($connect);
            header('Location: eventreg.php');
            exit();
        }
        else{
            echo "Registration ID to delete is not received!";
        }
    }
?>