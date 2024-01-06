<?php
    include ('../AdminSide/connection.php');
    $mid = $_POST['mid'];
    $mname = $_POST['mname'];
    $stuid = $_POST['stuid'];
    $YandM = $_POST['YandM'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $query = "UPDATE membertable SET member_name = '$mname', stu_id = '$stuid', year_and_major = '$YandM',
                email = '$email', gender = '$gender' WHERE memberID = '$mid'";
    mysqli_query($connect, $query);
    mysqli_close($connect);
    header('Location: membertable.php');
    exit();
?>