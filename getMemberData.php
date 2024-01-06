<?php
    include ('../AdminSide/connection.php');
    
    if(isset($_GET['mid'])){
        $memberid = $_GET['mid'];
        $query = "select * from membertable where memberID = '$memberid'";
        $result = mysqli_query($connect, $query);
        if($row = mysqli_fetch_assoc($result)){
            echo json_encode($row);
        }
    }
?>