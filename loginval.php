<?php
    $nameErr = "";
    $passErr = "";
    $invalid = "";
    if(isset($_POST["submit"])){
        if(!empty($_POST['user']) && !empty($_POST['pass'])) {
            $user=$_POST['user'];
            $pass=$_POST['pass'];
            $con=mysqli_connect('localhost','root','','tennisclub') or die(mysqli_error($con));
            $query=mysqli_query($con,"SELECT * FROM usertable WHERE username='".$user."' AND password='".$pass."'");
            $numrows=mysqli_num_rows($query);
            if($numrows!=0)
            {
                while($row=mysqli_fetch_assoc($query))
                {
                    $dbusername=$row['username'];
                    $dbpassword=$row['password'];
                    $dprole = $row['role'];
                }
                if($user == $dbusername && $pass == $dbpassword)
                {
                    if($dprole == 0){
                        $_SESSION['sess_user']=$user;
                        header("Location: ../AdminSide/admin.php");
                        session_start();
                        $_SESSION['sess_user']=$user;  
                        exit();
                    }
                    else{
                        header('location: ../UserSide/home.php?denied=1');
                    }           
                }                 
            }
            else {
                header('location: ../UserSide/home.php?invalid=1');
            } 
        }
        else {
            header('location: ../UserSide/home.php?empty=1');
        }        
    }
    ?>