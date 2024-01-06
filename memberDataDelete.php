<?php
    include ('../AdminSide/connection.php');
    if(isset($_GET['mid'])){
        $mid = $_GET['mid'];
        $query = "DELETE FROM membertable WHERE memberID = '$mid'";
        mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: membertable.php');
        exit();
    }
    else{
        echo "MemberID to delete is not received!";
    }
?>