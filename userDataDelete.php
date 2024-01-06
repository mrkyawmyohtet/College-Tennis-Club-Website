<?php
    include ('../AdminSide/connection.php');
    if(isset($_GET['uid'])){
        $uid = $_GET['uid'];
        $query = "DELETE FROM usertable WHERE userID = '$uid'";
        mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: usertable.php');
        exit();
    }
    else{
        echo "User ID is not sent to delete the user!";
    }
?>