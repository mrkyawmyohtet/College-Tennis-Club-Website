<?php
    include ('../AdminSide/connection.php');
        $name = $_POST['uname'];
        $pass = $_POST['upass'];
        $role = $_POST['role'];
        $query = "INSERT INTO usertable (username, password, role) VALUES ('$name', '$pass', '$role')";
        mysqli_query($connect, $query);
        mysqli_close($connect);
        header('Location: usertable.php');
        exit();
?>