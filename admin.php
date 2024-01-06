<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location: ../UserSide/home.php");
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/f2723b2bac.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="icon" href="../photos/v1mLRoGq_400x400.ico" type="Image/x-icon">
  <title>TMC Tennis Club - Admin Side</title>
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .allcontainer{
      height: 800px;
    }

    .logo{
      width: 200px;
      height: 80px;
      background-image: url("../photos/TMC-Logo4-e1479261887399.png");
      background-position: left;
      background-size: 100%;
      background-repeat: no-repeat;
    }

    .navigation{
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 100px 0 20px;
      position: sticky;
      top: 0;
      z-index: 100;
      backdrop-filter: blur(10px);
    }

    .navigation a{
      padding: 10px;
      text-decoration: none;
      font-family: Nato Sans, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 600;
      color: black;
      transition: all 0.3s ease-in-out;
    }

    .navigation a:hover{
        background-color: #f74d61;
        border-top-right-radius: 0.5em;
        border-bottom-left-radius: 0.7em;
        color: #fff;
    }

    .navigation h5{
      background-color: #f74d61;
      padding: 10px;
      font-family: Nato Sans, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #fff;
      border-top-right-radius: 0.5em;
      border-bottom-left-radius: 0.7em;
    }

    .navigation .active{
      background-color: #f74d61;
      border-top-right-radius: 0.5em;
      border-bottom-left-radius: 0.7em;
      color: #fff;
    }

    hr{
      width: 80%;
      margin: auto;
      position: sticky;
      z-index: 100;
      top: 80px;
    }

    .welcome{
      position: relative;
      width: 100%;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .welcome img{
      width: 300px;
      height: auto;
      padding-right: 20px;
    }

    footer{
      position: relative;
      bottom: 0;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: black;
      z-index: 100;
      height: 100px;           
    }

    footer img{
      width: 200px;
      height: auto;
    }

    footer p{
      font-size: 20px;
      padding-left: 20px;
      font-weight: 600;
      color: white;
    }

    footer .name{
      font-size: 10px;
    }
  </style>
</head>
<body>
    <div class="allcontainer">
      <div class="navigation">
          <div class="logo"></div>
          <h5><i class="fa-solid fa-circle-user"></i> <?=$_SESSION['sess_user'];?></h5>
          <nav>
            <a href="" class="active"><i class="fa-solid fa-house"></i>Home</a>
            <a href="usertable.php">UserTable</a>
            <a href="membertable.php">MemberTable</a>
            <a href="eventtable.php">Events</a>
            <a href="eventreg.php">Event Registrations</a>
            <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#logoutconfirm">
              <i class="fa-solid fa-right-from-bracket"></i>LogOut</a>
          </nav>
      </div>
      <hr>
      <div class="welcome">
        <img src="../photos/906343.png" alt="Admin Logo">
        <h1>Welcome to the Admin Panal, <span style="color: red;"><?=$_SESSION['sess_user'];?></span>!</h1>
      </div>
    </div>

    <!-- modal for logout -->    
    <!-- Modal Body -->
    <div class="modal fade" id="logoutconfirm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to logout?
          </div>
          <div class="modal-footer">
            <a href="logout.php" type="button" class="btn btn-secondary">Yes</a>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
    <footer>
        <img src="..\photos\Logo-Small-01.png" alt="TMC Logo">
        <p>&copy;TMC STUDENT TENNIS CLUB</p>
        <p class="name">
            &copy;Kyaw Myo Htet <br>
            <i class="fa-solid fa-phone-volume"></i>+95-987654321
        </p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>

<?php
}
?>