<?php
    include('../AdminSide/connection.php');
    $mname = $_POST['mname'];
    $stuid = $_POST['stuid'];
    $YandM = $_POST['YandM'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $query = "INSERT INTO membertable(member_name, stu_id, year_and_major, email, gender) VALUES
                ('$mname', '$stuid', '$YandM', '$email', '$gender')";
    $result = mysqli_query($connect, $query);
    if($result){
        mysqli_close($connect);
        header('Location: membertable.php');
        exit();
    }
    else{
        echo "Error." . mysqli_error($result);
    }
?>