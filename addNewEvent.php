<?php
    include('../AdminSide/connection.php');
    $etitle = $_POST['etitle'];
    $eplace = $_POST['eplace'];
    $edate = $_POST['edate'];
    $etype = $_POST['etype'];
    $org = $_POST['org'];

    $query = "INSERT INTO eventtable (eventTitle, eventPlace, eventDate, eventType, organizer) VALUES
            ('$etitle', '$eplace', '$edate', '$etype', '$org')";
    $result = mysqli_query($connect, $query);
    if($result){
        mysqli_close($connect);
        header('Location: eventtable.php');
        exit();
    }
    else{
        echo "Error" . mysqli_error($result);
    }
?>