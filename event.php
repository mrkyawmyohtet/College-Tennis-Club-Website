<!-- getting connection with database -->
<?php
session_start();
    require_once 'connection.php';
    $query = "select * from eventtable";
    mysqli_select_db($connect, "tennisclub");
    $result = mysqli_query($connect, $query);
?>

<!-- registration form validation -->
<?php
        $nameErr = $emailErr = $contErr = $genderErr =  "";        
        //Input fields validation  
        if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
            //String Validation  
            if (empty($_POST["firstname"]) || empty($_POST["lastname"])) {  
                $nameErr = "Name is required";  
            } else {  
                $firstname = input_data($_POST["firstname"]);
                $lastname =  input_data($_POST["lastname"]);
                $fullname = $firstname . '' . $lastname;
                    // check if name only contains letters and whitespace  
                    if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {  
                        $nameErr = "Only alphabets and white space are allowed";  
                    }
            }
            
            //Email Validation   
            if (empty($_POST["email"])) {  
                    $emailErr = "Email is required";  
            } else {  
                    $email = input_data($_POST["email"]);  
                    // check that the e-mail address is well-formed  
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                        $emailErr = "Invalid email format";  
                    }  
            }
            
            // Cont. number validation
            if (empty($_POST["contnumber"])) {  
                $contErr = "Cont. number is required";  
            } else {  
                    $mobileno = input_data($_POST["contnumber"]);  
                    // check if mobile no is well-formed  
                    if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
                    $contErr = "Only numeric value is allowed.";  
                    }  
                //check mobile no length should not be less and greator than 10  
                if (strlen ($mobileno) != 10) {  
                    $contErr = "Mobile no must contain 10 digits.";
                    }  
            }
            
            //Gender Validation  
            if (empty($_POST["gender"])) {  
                $genderErr = "Gender is required";  
            } else {
                if(input_data($_POST["gender"] == "male")){
                    $gender = 0;
                }
                else{
                    $gender = 1;
                }
            }  
        
        }  
        function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f2723b2bac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../UserSide/event.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="icon" href="../photos/v1mLRoGq_400x400.ico" type="Image/x-icon">
    <title>TMC Tennis Club - Events</title>
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

        .nav{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 100px 0 20px;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(10px);
        }

        .nav a{
            padding: 10px;
            text-decoration: none;
            font-family: Nato Sans, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 600;
            color: black;
            transition: all 0.3s ease-in-out;
        }

        .nav a:hover{
            background-color: #f74d61;
            border-top-right-radius: 0.5em;
            border-bottom-left-radius: 0.7em;
            color: #fff;
        }

        .nav a:nth-child(5){
            background-color: rgb(255, 217, 0);
            border-radius: 0.7em;
            box-shadow: 0 0 10px yellow;
            color: black;
            font-size: 10pt;
        }

        .nav a:nth-child(5):hover{
            color: #fff;
            text-shadow: 0 0 5px black;
        }

        hr{
            width: 80%;
            margin: auto;
            position: sticky;
            z-index: 100;
            top: 80px;
            border: 1px solid;
        }

        .photos{
            width: 100%;
            height: 500px;
            text-align: center;
            background-color: #f74d61;
            padding: 20px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .photos h1{
            margin: 0 auto;
            padding-bottom: 20px;
            font-weight: 600px;
            color: #fff;
        }

        .slideshow{
            width: 70%;
            height: 350px;
            margin: 0 auto;
            background-color: #fff;
        }

        .dot{
            position: relative;
            display: inline-block;
            border: 3px solid;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            cursor: pointer;
            top: -40px;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        .prev, .next{
            border-radius: 0.5em;
            padding: 15px;
            position: absolute;
            font-size: 16pt;
            color: black;
            width: auto;
            top: 50%;
            z-index: 100;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .next{
            right: 300px;
        }

        .prev{
            left: 300px;
        }

        .next:hover,
        .prev:hover{
            background-color: #f74d61;
            color: white;
        }

        .slides{
            width: 550px;
            height: auto;
            margin: 0 auto;
            padding: 50px;
            display: none;
            animation: fade 0.6s ease-in-out;
        }

        .slides img{
            width: 100%;
            height: auto;
        }

        @keyframes fade{
            from {opacity: .4}
            to {opacity: 1}
        }

        /* .events{
            position: relative;
            text-align: center;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-evenly;
        } */

        h1{
            position: relative;
            text-align: center;
            margin-top: 30px;
        }

        .card{
            text-align: left;
        }

        .card:hover{
            box-shadow: 0 0 10px black;
            cursor: pointer;
        }

        .event-cards{
            margin: 10px;
        }

        .error{
            color: red;
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
        <div class="nav">
            <div class="logo"></div>
            <nav>
                <a href="../UserSide/home.php"><i class="fa-solid fa-house"></i></a>
                <a href="../UserSide/about.html">About</a>
                <a href="../UserSide/event.php">Event</a>
                <a href="../UserSide/achievement.html">Our Achievements</a>
                <a href="" data-bs-toggle="modal" data-bs-target="#contactUs">CONTACT US</a>
            </nav>
        </div>
        <hr>
        <div class="photos">
            <h1>Photos from Events...</h1>
            <div class="slideshow">
                <div class="slides">
                    <img src="../photos/images (5).jpg" alt="Event Day Photos">
                </div>
                <div class="slides">
                    <img src="../photos/images (6).jpg" alt="Event Day Photos">
                </div>
                <div class="slides">
                    <img src="../photos/images (8).jpg" alt="Event Day Photos">
                </div>
                <a class="next" onclick="plusSlide(+1)"><i class="fa-solid fa-chevron-right"></i></a>
                <a class="prev" onclick="plusSlide(-1)"><i class="fa-solid fa-chevron-left"></i></a>
                <div>
                    <span class="dot" onclick="currentslide(1)"></span>
                    <span class="dot" onclick="currentslide(2)"></span>
                    <span class="dot" onclick="currentslide(3)"></span>
                </div>
            </div>            
        </div>
        <hr>
        <h1 style="width: 100%; background-color: #f74d61; padding: 20px; color: white;">
            Events and respective dates...
        </h1>
        <h5 style="width: 50%; text-align: center; margin: 0 auto; border-left:rgb(255, 217, 0) 5px solid; border-right: #f74d61 5px solid; ">
            In here, you can see the upcoming Events and can register upon your choice...
        </h5> 
        <div class="events">
                                   
            <?php
            if($result){
                $cardCount = 0;
                echo "<table style='margin: 0 auto;'>";
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    $cardCount++;
                    if($cardCount == 1){
                        echo "<tr>";
                    }        
            ?>
            <td>
                <div class="event-cards">
                    <div class="row row-cols-1 row-cols-md-5">
                        <div class="col">
                            <div class='card border-info mb-3' style='width: 15rem;'>
                            <img src="../photos/tennis-player-isolated-white-background-tennis-player-sports-player-vector-design_542607-2998.avif" alt="">                  
                            <div class='card-body'>
                                <h5 class='card-title'><?php echo " ".$row["eventTitle"]." " ?></h5>
                            </div>
                                <ul class='list-group list-group-flush'>
                                    <li class='list-group-item'><?php echo "ID: ".$row["eventID"] ." ";?></li>
                                    <li class='list-group-item'><?php echo "Title: ".$row["eventTitle"]." "?></li>
                                    <li class='list-group-item'><?php echo "Place: ".$row["eventPlace"]." "?></li>
                                    <li class='list-group-item'><?php echo "Date: ".$row["eventDate"]." "?></li>
                                    <li class='list-group-item'><?php echo "Type: ".$row["eventType"]." "?></li>
                                    <li class='list-group-item'><?php echo "Organizer: ".$row["organizer"]." "?></li>
                                </ul>
                                <div class='card-body mx-auto'>
                                    <button type="button" class="btn btn-outline-warning"  data-bs-toggle="modal" data-bs-target="#modalId" data-event-id="<?php echo $row['eventID'];?>" data-event-title="<?php echo $row['eventTitle'];?>">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </td>
            <?php
                    if($cardCount == 4){
                        echo "</tr>";
                        $cardCount = 0;
                    }
                }
                echo "<td style='font-size: 20px; font-weight: 600;'>More Events Coming Soon...</td>";
                if($cardCount > 0){
                    while($cardCount < 4){
                        echo "<td></td>";
                        $cardCount++;
                    }
                    echo "</tr>";
                }
                echo "</table";
            }
            ?>
        </div>
        
        <!-- Modal for registration for event-->
        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Register For Event -
                            <label id="eventTitleInput" name="eventTitle"></label>
                            <input type="hidden" id="eventIdInput" name="eventId">
                        </h5>        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm();">
                            <!-- to get the respective event title for registration-->
                            <input type="hidden" id="eventTitle" name="eventTitle">
                                
                                <div class="col-md-6">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <span class="error" id="FnameErr">* <?php echo $nameErr ?></span> <br> 
                                    <input type="text" class="form-control" id="firstname" name="firstname">   
                                </div>
                                <div class="col-md-6">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <span class="error" id="LnameErr">* <?php echo $nameErr ?></span> <br> 
                                    <input type="text" class="form-control" id="lastname" name="lastname">
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <span class="error" id="emailErr">* <?php echo $emailErr ?></span> <br> 
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-12">
                                    <label for="contnumber" class="form-label">Cont. Number</label>
                                    <span class="error" id="contErr">* <?php echo $contErr ?></span> <br>
                                    <span class="small"> Phone Number must contain 10-degits!</span> 
                                    <input type="text" class="form-control" id="contnumber" name="contnumber">
                                </div>
                                <div class="col-12">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input type="radio" id="male" name="gender" value="male">Male
                                    <input type="radio" id="female" name="gender" value="female">Female
                                    <span class="error" id="genderErr">* <?php echo $genderErr ?></span> <br>
                                </div>                                       
                        </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
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
        
        <!-- to get the event id and event title respectively -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
             var registerButtons = document.querySelectorAll('.btn-outline-warning');

                registerButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        var eventId = button.getAttribute('data-event-id');
                        var eventTitle = button.getAttribute('data-event-title');
                        document.getElementById('eventIdInput').value = eventId;
                        document.getElementById('eventTitle').value = eventTitle;
                        document.getElementById('eventTitleInput').innerHTML = eventTitle;
                    });
                });
            });

            // for validation empty fields
            function validateForm() {
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var contnumber = document.getElementById("contnumber").value;
            var male = document.getElementById("male");
            var female = document.getElementById("female");
            var FnameError = document.getElementById("FnameErr");
            var LnameError = document.getElementById("LnameErr");
            var emailError = document.getElementById("emailErr");
            var contError = document.getElementById("contErr");
            var genderError = document.getElementById("genderErr");
            
            // Reset previous error messages
            FnameError.textContent = "";
            LnameError.textContent = "";
            emailError.textContent = "";
            contError.textContent = "";
            genderError.textContent = "";

            if (firstname === "") {
                FnameError.textContent = "Please enter Your First Name.";
                return false;
            }

            if (lastname === "") {
                LnameError.textContent = "Please enter Your Last Name.";
                return false;
            }

            if (email === "") {
                emailError.textContent = "Please enter an email.";
                return false;
            }

            if (contnumber === "") {
                contError.textContent = "Please enter a Cont Number.";
                return false;
            }

            if (!(male.checked) && !(female.checked)) {
                genderError.textContent = "Please choose Gender.";
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

        <!-- when the registration form is correctly filled, keep the data in database -->
        <?php
            if(isset($_POST["submit"])){
                if($nameErr == "" &&  $emailErr == "" && $genderErr == "" && $contErr == ""){
                    $table_name = "eventRegister";
                    $eventTitle = $_POST['eventTitle'];
                    $connect = mysqli_connect("localhost", "root", "", "tennisclub") or die("Error" . mysqli_error($connect));
                    // First to check if a person has already registered for a event
                    $checksql = "select * from eventRegister where playerName = '$fullname' and eventTitle = '$eventTitle'";
                    $result = mysqli_query($connect, $checksql);
                    if(mysqli_num_rows($result) > 0){
                        echo "<script>window.alert('You have already registered this event once!')</script>";
                    }
                    else{
                        $sql = "insert into $table_name(playerName, playerEmail, playerPhnum, playerGender, eventTitle) VALUES 
                            ('$fullname','$email', '$mobileno','$gender', '$eventTitle')";
                        echo "<script>window.alert('Registration Successful');</script>";
                        if(!mysqli_query($connect, $sql)){
                            echo "('Error.' . mysqli_error($connect))";
                        }
                    }                    
                }
            }
        ?>
        
    </div>
    <footer>
        <img src="..\photos\Logo-Small-01.png" alt="TMC Logo">
        <p>&copy;TMC STUDENT TENNIS CLUB</p>
        <p class="name">
            &copy;Kyaw Myo Htet <br>
            <i class="fa-solid fa-phone-volume"></i>+95-987654321
        </p>
    </footer>
    <script src="event.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>