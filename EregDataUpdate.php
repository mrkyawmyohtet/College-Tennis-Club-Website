<?php
    include('../AdminSide/connection.php');
    $rid = $_POST['rid'];
    $pname = $_POST['pname'];
    $pemail = $_POST['pemail'];
    $pPhnum = $_POST['pPhnum'];
    $gender = $_POST['gender'];
    $etitle = $_POST['etitle'];

    $query = "UPDATE eventregister SET playerName = '$pname', playerEmail = '$pemail', playerPhnum = '$pPhnum',
                playerGender = '$gender', eventTitle = '$etitle' WHERE RegID = '$rid'";
    mysqli_query($connect, $query);
    mysqli_close($connect);
    header('Location: eventreg.php');
    exit();
?>