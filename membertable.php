<?php
    include ('../AdminSide/connection.php');
    $sql = "select * from membertable";
    $members = mysqli_query($connect, $sql);
    $membercount = mysqli_num_rows($members);
?>

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
  <title>TMC Tennis Club-Members' Data</title>
  <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
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

    .table-responsive{
      width: 80%; 
      margin: 0 auto; 
      margin-top: 80px;
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
        margin-top: 30px;      
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
            <a href="admin.php"><i class="fa-solid fa-house"></i>Home</a>
            <a href="usertable.php">UserTable</a>
            <a href="membertable.php" class="active">MemberTable</a>
            <a href="eventtable.php">Events</a>
            <a href="eventreg.php">Event Registrations</a>
            <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#logoutconfirm">
              <i class="fa-solid fa-right-from-bracket"></i>LogOut</a>
          </nav>
      </div>
      <hr>
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


    <!-- Member Data Table -->
    <div class="table-responsive">
        <h2>Current Members - 
            <span class="badge rounded-pill text-bg-danger">
                <?php echo $membercount; ?>
            </span>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#addMember">Add New Member</button>
        </h2>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Member ID</th>
                    <th scope="col">Member Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Year and Major</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scopt="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php while($result = mysqli_fetch_array($members, MYSQLI_ASSOC)){ ?>
                <tr class="">
                    <td>
                        <?php echo $result['memberID'];?>
                    </td>
                    <td>
                        <?php echo $result['member_name'];?>
                    </td>
                    <td>
                        <?php echo $result['stu_id'];?>
                    </td>
                    <td>
                        <?php echo $result['year_and_major'];?>
                    </td>
                    <td>
                        <?php echo $result['email'];?>
                    </td>
                    <td>
                        <?php 
                            if($result['gender'] == 0){
                                echo "<label style='color: #2e88e8;'><i class='fa-solid fa-person'></i>Male</label>";
                            }
                            else{
                                echo "<label style='color: #f59d9d;'><i class='fa-solid fa-person-dress'></i>Female</label>";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            echo "<button type='button' id='updatebtn' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#updateModal' data-member-id='".$result['memberID']."'>Update</button>";
                            echo "<button type='button' id='deletebtn' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-member-id='".$result['memberID']."'>Delete</button>";
                        ?>
                    </td>
                </tr>                
                <?php  }   ?>        
            </tbody>
        </table>
    </div>

    <!-- Modal for update member data-->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Update User Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="memberDataUpdate.php" method="POST" class="row g-3" id="updateMember">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="col-12">
                                <!-- <label for="uid" class="form-label">User ID</label>  -->
                                <input type="hidden" class="form-control" id="mid" name="mid">
                            </div>
                            <div class="col-12">
                                <label for="mname" class="form-label">Member Name</label>
                                <input type="text" class="form-control" id="mname" name="mname">
                            </div>
                            <div class="col-12">
                                <label for="stuid" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="stuid" name="stuid">
                            </div>
                            <div class="col-12">
                                <label for="YandM" class="form-label">Year and Major</label>
                                <input type="text" class="form-control" id="YandM" name="YandM">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="" class="form-select">
                                    <option value="0" selected>Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for delete user data-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Delete Member Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        Are you sure you want to remove this member?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmbtn">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for adding new member data-->
    <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Add New Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="addNewMember.php" method="POST" class="row g-3" id="addMember">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="col-12">
                                <!-- <label for="uid" class="form-label">User ID</label>  -->
                                <input type="hidden" class="form-control" id="mid" name="mid">
                            </div>
                            <div class="col-12">
                                <label for="mname" class="form-label">Member Name</label>
                                <input type="text" class="form-control" id="mname" name="mname">
                            </div>
                            <div class="col-12">
                                <label for="stuid" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="stuid" name="stuid">
                            </div>
                            <div class="col-12">
                                <label for="YandM" class="form-label">Year and Major</label>
                                <input type="text" class="form-control" id="YandM" name="YandM">
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="col-12">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="" class="form-select">
                                    <option value="0" selected>Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mb-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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

    <!-- script for update member data -->
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
            const updateBtn = document.getElementById('updatebtn');
            const form = document.querySelector('#updateMember');
            document.querySelectorAll('[data-bs-target="#updateModal"]').forEach(function(button){
                button.addEventListener('click', function(){
                    const memberID = button.getAttribute('data-member-id');
                    fetch('getMemberData.php?mid=' + memberID)
                    .then(response => response.json())
                    .then(data => {
                        form.mid.value = data.memberID;
                        form.mname.value = data.member_name;
                        form.stuid.value = data.stu_id;
                        form.YandM.value = data.year_and_major;
                        form.email.value = data.email;
                        form.gender.value = data.gender == '0' ? '0' : '1';
                    });
                    updateModal.show();
                });
            });
        });
    </script>

    <!-- script for delete member data -->
    <script>
        var modalId = document.getElementById('deleteModal');
        
        modalId.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let memberID = button.getAttribute('data-member-id');
        
            document.getElementById('confirmbtn').addEventListener('click', function(){
                var url = "memberDataDelete.php?mid=" + memberID;
                window.location.href = url;
            })
        });
    </script>
    
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