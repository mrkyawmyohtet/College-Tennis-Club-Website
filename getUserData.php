<?php
    include ('../AdminSide/connection.php');
    
    if(isset($_GET['uid'])){
        $user_id = $_GET['uid'];
        $query = "select * from usertable where userID = $user_id";
        mysqli_select_db($connect, 'tennisclub');
        $result = mysqli_query($connect, $query);
        if($row = mysqli_fetch_assoc($result)){
            echo json_encode($row);
        }
    }
?>