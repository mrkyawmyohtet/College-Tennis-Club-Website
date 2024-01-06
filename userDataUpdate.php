<?php
    include ('../AdminSide/connection.php');
        $uid = $_POST['uid'];
        $name = $_POST['uname'];
        $pass = $_POST['upass'];
        $role = $_POST['role'];
        $query = "UPDATE usertable SET username = '$name', password = '$pass', role = '$role' WHERE userID = '$uid'";
        mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: usertable.php');
        exit();
?>