<!-- for registration validation -->
<?php
        $nameErr = $idErr = $majorErr = $emailErr = $genderErr = $expErr = "";        
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

            //id Validation  
            if (empty($_POST["ID"])) {  
                $idErr = "ID is required";  
            } 
            else {  
                $id = input_data($_POST["ID"]);
            }

            //Academic year and major Validation      
            if (empty($_POST["major"])) {  
                $majorErr = "Academic year and major is required!";  
            }
            else{
                $major = input_data($_POST["major"]);
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
        
            //Experience Validation
            if(empty($_POST["exp"])){
                $expErr = "You need to describe your experience!";
            }
            else{
                $exp = input_data($_POST["exp"]);
            }
        }  
        function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
        }
    ?>

<!-- to add the form data into the database -->
<?php
    session_start();
        if(isset($_POST["submit"])){
            if($nameErr == "" && $idErr == "" && $majorErr == "" && $emailErr == "" && $genderErr == "" && $expErr == ""){
                $table_name = "membertable";
                $connect = mysqli_connect("localhost", "root", "", "tennisclub") or die("Error" . mysqli_error($connect));
                $sql = "insert into $table_name(member_name, stu_id, year_and_major, email, gender) VALUES 
                        ('$fullname', '$id', '$major', '$email', '$gender')";
                if(!mysqli_query($connect, $sql)){
                    die('Error.' . mysqli_error($connect));
                }
                else{
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['id'] = $id;
                    $_SESSION['major'] = $major;
                    $_SESSION['email'] = $email;
                    $_SESSION['gender'] = $gender;
                    header('Location: ../UserSide/register.php?addedDetail=1');
                }
            }
        }        
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../UserSide/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="../photos/v1mLRoGq_400x400.ico" type="Image/x-icon">
    <title>TMC Tennis Club-Registeration Page</title>
    <style>
        .error{ color: red;}

        .registration{
            width: 60%;
            height: auto;
            margin: 0 auto;
            margin-top: 40px;
            margin-bottom: 40px;
            border: 1px solid;
            border-radius: 0.5em;
            padding: 20px;
            font-weight: 600;
            background-color: transparent;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 10px black;
        }

        .registration a{
            border: 1px solid;
            padding: 10px;
            text-decoration: none;
            border-top-left-radius: 0.5em;
            border-bottom-right-radius: 0.5em;
            color: black;
            transition: all 0.3s ease-in-out;
        }

        .registration a:hover{
            box-shadow: 0 0 5px #000;
        }
    </style>
</head>
<body>
    <div class="registration">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            FullName: <br>
            <input type="text" name="firstname" id="firstname" placeholder="FirstName" maxlength="20">
            <input type="text" name="lastname" id="lastname" placeholder="LastName" maxlength="20"><br>
            <span class="error">* <?php echo $nameErr ?></span> <br>     
            ID: <br>
            <input type="text" name="ID" id="ID"  maxlength="10"><br>
            <span class="error">* <?php echo $idErr ?></span> <br>   
            Academic Year and Major: <br>
            <input type="text" name="major" id="major" placeholder="Eg.First year, Computer Science"><br>
            <span class="error">* <?php echo $majorErr ?></span> <br>
            Email: <br>
            <input type="email" name="email" id="email" placeholder="Eg.abc123@gmail.com"><br>
            <span class="error">* <?php echo $emailErr ?></span> <br>
            Gender: <br>
            <input type="radio" id="male" name="gender" value="male">Male
            <input type="radio" id="female" name="gender" value="female">Female <br>
            <span class="error">* <?php echo $genderErr ?></span> <br>
            Your Experience on this sport: <br>
            <input type="radio" id="beginner" name="exp">I am a beginner
            <input type="radio" id="experience" name="exp">I have experience before
            <input type="radio" id="expert" name="exp">I am expert <br>
            <span class="error">* <?php echo $expErr ?></span> <br>
            Any comment: <br>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea> <br>
            <p>
                <i>Please Fill the above fields (you can skip Comment section if you don't have one) completely and precisely.
                Once you have submitted the registration form, we will contact you very shortly to comfirm your registration.
                Have a nice college life! :)</i>
            </p>
            <br>
            <input type="submit" value="Send" name="submit">
            <input type="Reset" value="Reset"> <br>
            <a href="../UserSide/home.php">Back to Home Page</a>    
        </form>
    </div>
    
    <!-- to show the submitted form's details in a modal -->
    <?php if(isset($_GET["addedDetail"])): ?>                
        <script>
            $(document).ready(function() {
                $('#detail').modal('show');
            });
        </script>
    <?php endif ?>

    <!-- Modal Body -->
    <!-- for access denied error -->
    <div class="modal fade" id="detail" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: green; color: #fff;">
                    <h5 class="modal-title" id="modalTitleId">Your registration Details:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close"></button>
                </div>
                <div class="modal-body" style="line-height: 30pt;">
                    Full Name: <b><?php echo $_SESSION['fullname']; ?></b> <br>
                    Student ID: <b><?php echo $_SESSION['id']; ?></b> <br>
                    Major: <b><?php echo $_SESSION['major']; ?></b> <br>
                    Email: <b><?php echo $_SESSION['email']; ?></b> <br>
                    Gender: <b><?php echo ($_SESSION['gender'] == 0) ? "male" : "female"; ?></b> <br>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <b>Thanks for registration as a member of our tennis club!</b>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    
</body>
</html>