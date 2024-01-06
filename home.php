<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../UserSide/home.css">
    <script src="https://kit.fontawesome.com/f2723b2bac.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="../photos/v1mLRoGq_400x400.ico" type="Image/x-icon">
    <title>TMC Tennis Club-Welcome Page</title>
    <style>
        .navigation a:nth-child(5){
            border: 1px solid;
            margin-left: 30px;
            cursor: pointer;
            background-color: inherit;
            width: 100px;
            height: 50px;
            font-size: 12pt;
            align-items: center;
        }

        hr{
            width: 80%;
            margin: auto;
            position: sticky;
            z-index: 100;
            top: 80px;
        }

        .btn button{
            display: inline-block;
            width: 100px;
            height: 50px;
            align-items: center;
            margin-left: 50px;
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
    <div class="all-container">
        <div class="navigation">
            <div class="logo"></div>
            <nav>
                <a href="../UserSide/about.html">About</a>
                <a href="../UserSide/event.php">Events</a>
                <a href="../UserSide/achievement.html">Our Achievements</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#contactUs">CONTACT US</a>
                <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#Id1" aria-controls="Id1">
                    <i class="fa-solid fa-user"></i>Log in
                </a>
            </nav>
        </div>
        <hr>
        <div class="first">
            <div class="text">
                <h3><i>Finding some activities for your college life...?</i></h3>
                <h1>Welcome to <span>TMC Tennis Club</span></h1>
                <h2>SPIRIT! FUN! COMMUNITY!</h2>
                <a href="../UserSide/register.php">
                    <button id="register">                    
                        <i class="fa-solid fa-circle-right"></i>Register Now                    
                    </button>
                </a>
            </div>
        </div>
        <hr>
        <div class="second">
            <div class="image"></div>
            <div class="text2">                
                <p>
                    In our Tennis Club, you can play tennis for fun with colleges in evenings or everytime you like.
                    <b>(Note - Reservation is required!)</b><br>
                    You can even practice for any tournaments with our coaches and achieve milestones within your college student life.
                </p>
            </div>
        </div>
        <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="Id1" aria-labelledby="Enable both scrolling & backdrop">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="Enable both scrolling & backdrop">Login Here</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="loginval.php" method="post" onsubmit="return validateForm();">
                <div class="mb-3">
                <label for="" class="form-label">Username:</label>
                <input type="text" class="form-control" name="user" id="username" placeholder="">
                <span id="usernameError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" id="password" placeholder="">
                <span id="passwordError" class="text-danger"></span>
                </div>
                <div class="btn">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary" name="submit" id="login">Login</button>
                </div>            
            </form>
        </div>
        </div>            
    </div>

    <!-- php for showing access denied alert and invalid user and password alert -->
    <?php if(isset($_GET["denied"])): ?>                
                <script>
                    $(document).ready(function() {
                        $('#accessdenied').modal('show');
                    });
                </script>
            <?php elseif(isset($_GET["invalid"])): ?>                
                <script>
                    $(document).ready(function() {
                        $('#invalid').modal('show');
                    });
                </script>
            <?php endif ?>

    <!-- Modal Body -->
    <!-- for access denied error -->
    <div class="modal fade" id="accessdenied" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header"  style="background-color: #eb8a83;">
                    <h5 class="modal-title" id="modalTitleId" style="color: #fff;"><i class="fa-solid fa-triangle-exclamation"></i>Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Access Denied! <br> You are not the admin of this website.
                </div>
            </div>
        </div>
    </div>

    <!-- for invalid user error -->
    <div class="modal fade" id="invalid" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header"  style="background-color: #eb8a83;">
                    <h5 class="modal-title" id="modalTitleId" style="color: #fff;"><i class="fa-solid fa-triangle-exclamation"></i>Alert</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">                    
                    Invalid Username or password! <br> Please re-enter the username and password correctly!
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal for contact us-->
    <div class="modal fade" id="contactUs" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Contact Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body">
                        <div class="container-fluid">
                                <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" name="" id="name" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" class="form-control" name="" id="email" aria-describedby="helpId" placeholder="">
                                </div>
                                <div class="mb-3">
                                <label for="" class="form-label">Any Comment or Question to us</label>
                                <textarea class="form-control" name="" id="" aria-describedby="helpId" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 80px; height: 40px;">Close</button>
                            <button type="submit" id="submit" class="btn btn-primary" style="width: 80px; height: 40px;">Send</button>
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

    <!-- javascript -->
    <script>
        // javascript to check empty fields
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var usernameError = document.getElementById("usernameError");
            var passwordError = document.getElementById("passwordError");
            
            // Reset previous error messages
            usernameError.textContent = "";
            passwordError.textContent = "";

            if (username === "") {
                usernameError.textContent = "Please enter a username.";
                return false;
            }

            if (password === "") {
                passwordError.textContent = "Please enter a password.";
                return false;
            }

            // If everything is filled in, the form will submit
            return true;
        }

        // javascript for contact us modal
        var modalId = document.getElementById('contactUs');
        var submit = document.getElementById('submit');
        submit.addEventListener('click', function(){
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            alert('Thanks for contacting us ' + name + '.\n We will reply very soon to your provided Email: ' + email);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>
</html>